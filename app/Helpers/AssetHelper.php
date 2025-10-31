<?php

namespace App\Helpers;

use App\Support\AssetPathResolver;
use App\Support\ResolvedAsset;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Services\AssetPerformanceMonitor;
use Exception;
use InvalidArgumentException;

class AssetHelper
{
    /**
     * Generate a proper asset URL that works with both www and non-www domains
     */
    public static function url(string $path): string
    {
        // If it's already a full URL, return as is
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }
        
        // Get the current request scheme and host
        $request = request();
        $scheme = $request->isSecure() ? 'https' : 'http';
        $host = $request->getHost();
        
        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        return $scheme . '://' . $host . '/' . $path;
    }
    
    /**
     * Generate a storage asset URL using Laravel's Storage facade for proper URLs
     */
    public static function storage(string $path): string
    {
        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        // Use Laravel's Storage facade to generate proper storage URLs
        return Storage::disk('public')->url($path);
    }
    
    /**
     * Generate a static asset URL using Vite for processed assets
     */
    public static function static(string $path): string
    {
        $resolver = new AssetPathResolver();
        
        // Normalize the path for resources/images if needed
        $normalizedPath = $resolver->normalizeResourcesPath($path);
        
        return Vite::asset($normalizedPath);
    }
    
    /**
     * Automatically detect asset type and route to appropriate method
     * 
     * Uses AssetPathResolver for intelligent asset type detection and routing
     */
    public static function detect(string $path): string
    {
        $startTime = microtime(true);
        
        try {
            // For external URLs, return as-is without validation
            if (filter_var($path, FILTER_VALIDATE_URL)) {
                return $path;
            }
            
            $resolver = new AssetPathResolver();
            $resolvedAsset = $resolver->resolve($path);
            
            $url = match ($resolvedAsset->type) {
                ResolvedAsset::TYPE_EXTERNAL => $resolvedAsset->path,
                ResolvedAsset::TYPE_STORAGE => self::storage($resolvedAsset->path),
                ResolvedAsset::TYPE_STATIC => self::static($resolvedAsset->path),
                ResolvedAsset::TYPE_DOMAIN => self::url($resolvedAsset->path),
                default => self::url($resolvedAsset->path),
            };
            
            // Record performance metric
            $loadTime = (microtime(true) - $startTime) * 1000;
            if (app()->bound(AssetPerformanceMonitor::class)) {
                app(AssetPerformanceMonitor::class)->recordAssetLoad($path, $loadTime, true);
            }
            
            return $url;
            
        } catch (Exception $e) {
            $loadTime = (microtime(true) - $startTime) * 1000;
            
            // Record failed performance metric
            if (app()->bound(AssetPerformanceMonitor::class)) {
                app(AssetPerformanceMonitor::class)->recordAssetLoad($path, $loadTime, false);
            }
            
            throw $e;
        }
    }
    
    /**
     * Generate asset URL with fallback handling for missing assets
     */
    public static function safeUrl(string $path, ?string $fallbackType = null): string
    {
        try {
            // For external URLs, return as-is
            if (filter_var($path, FILTER_VALIDATE_URL)) {
                return $path;
            }
            
            // Validate path if validation is enabled
            if (config('assets.validation.validate_paths', true)) {
                if (!self::validateAssetPath($path)) {
                    self::logAssetError("Invalid asset path in safeUrl: {$path}");
                    return self::getFallbackUrl($fallbackType ?? 'static');
                }
            }
            
            $url = self::detect($path);
            
            // Check if asset exists if validation is enabled
            if (config('assets.validation.check_existence', true)) {
                if (!self::assetExists($path)) {
                    return self::getFallbackUrl($fallbackType ?? 'static');
                }
            }
            
            return $url;
        } catch (Exception $e) {
            if (config('assets.validation.log_missing_assets', true)) {
                Log::warning("Asset URL generation failed for: {$path}", [
                    'error' => $e->getMessage(),
                    'fallback_type' => $fallbackType
                ]);
            }
            
            return self::getFallbackUrl($fallbackType ?? 'static');
        }
    }
    
    /**
     * Generate storage asset URL with fallback handling
     */
    public static function safeStorage(string $path): string
    {
        try {
            // Remove leading slash if present for consistency
            $cleanPath = ltrim($path, '/');
            
            // Check if storage file exists
            if (Storage::disk('public')->exists($cleanPath)) {
                return self::storage($cleanPath);
            }
            
            if (config('assets.validation.log_missing_assets', true)) {
                Log::warning("Storage asset not found: {$cleanPath}");
            }
            
            // Use blog_cover fallback if available, otherwise use storage fallback
            $fallbackType = 'storage';
            if (config('assets.fallbacks.blog_cover')) {
                $fallbackType = 'blog_cover';
            }
            
            return self::getFallbackUrl($fallbackType);
        } catch (Exception $e) {
            if (config('assets.validation.log_missing_assets', true)) {
                Log::warning("Storage asset URL generation failed for: {$path}", [
                    'error' => $e->getMessage()
                ]);
            }
            
            // Use blog_cover fallback if available, otherwise use storage fallback
            $fallbackType = 'storage';
            if (config('assets.fallbacks.blog_cover')) {
                $fallbackType = 'blog_cover';
            }
            
            return self::getFallbackUrl($fallbackType);
        }
    }
    
    /**
     * Generate static asset URL with fallback handling
     */
    public static function safeStatic(string $path): string
    {
        try {
            $url = self::static($path);
            
            // For static assets, check if the source file exists in resources
            if (config('assets.validation.check_existence', true)) {
                $resourcePath = resource_path('images/' . ltrim($path, '/'));
                if (!File::exists($resourcePath)) {
                    if (config('assets.validation.log_missing_assets', true)) {
                        Log::warning("Static asset not found: {$path}");
                    }
                    return self::getFallbackUrl('static');
                }
            }
            
            return $url;
        } catch (Exception $e) {
            if (config('assets.validation.log_missing_assets', true)) {
                Log::warning("Static asset URL generation failed for: {$path}", [
                    'error' => $e->getMessage()
                ]);
            }
            
            return self::getFallbackUrl('static');
        }
    }
    
    /**
     * Get fallback URL for specified asset type
     */
    public static function getFallbackUrl(string $type): string
    {
        $fallbackPath = config("assets.fallbacks.{$type}");
        
        if (!$fallbackPath) {
            // Return a default fallback if no specific fallback is configured
            $fallbackPath = config('assets.fallbacks.static', 'resources/images/logo.svg');
        }
        
        try {
            // Generate URL for fallback asset without recursion
            if ($type === 'storage') {
                return Storage::disk('public')->url($fallbackPath);
            } else {
                // For static assets (including blog_cover, profile, etc.), use Vite
                return Vite::asset($fallbackPath);
            }
        } catch (Exception $e) {
            // Last resort: return a data URL for a 1x1 transparent pixel
            return 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMSIgaGVpZ2h0PSIxIiB2aWV3Qm94PSIwIDAgMSAxIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InRyYW5zcGFyZW50Ii8+PC9zdmc+';
        }
    }
    
    /**
     * Check if an asset exists
     */
    public static function assetExists(string $path): bool
    {
        try {
            // Validate path first for security
            if (!self::validateAssetPath($path)) {
                return false;
            }
            
            $resolver = new AssetPathResolver();
            $resolvedAsset = $resolver->resolve($path);
            
            return match ($resolvedAsset->type) {
                ResolvedAsset::TYPE_EXTERNAL => self::checkExternalAsset($resolvedAsset->path),
                ResolvedAsset::TYPE_STORAGE => Storage::disk('public')->exists($resolvedAsset->path),
                ResolvedAsset::TYPE_STATIC => File::exists(resource_path('images/' . ltrim($resolvedAsset->path, '/'))),
                default => true, // Default to true for other types
            };
        } catch (Exception $e) {
            self::logAssetError("Asset existence check failed for: {$path}", $e);
            return false;
        }
    }
    
    /**
     * Check if external asset exists (with caching to avoid repeated requests)
     */
    private static function checkExternalAsset(string $url): bool
    {
        if (!config('assets.validation.check_external_assets', false)) {
            return true; // Skip external checks if disabled
        }
        
        $cacheKey = config('assets.cache.key_prefix') . 'external_' . md5($url);
        
        return Cache::remember($cacheKey, config('assets.cache.ttl', 3600), function () use ($url) {
            try {
                $headers = get_headers($url, 1);
                return $headers && strpos($headers[0], '200') !== false;
            } catch (Exception $e) {
                self::logAssetError("External asset check failed for: {$url}", $e);
                return false;
            }
        });
    }
    
    /**
     * Validate asset path for security and format
     */
    public static function validateAssetPath(string $path): bool
    {
        try {
            // Check for directory traversal attempts
            if (strpos($path, '..') !== false) {
                self::logAssetError("Directory traversal attempt detected in path: {$path}");
                return false;
            }
            
            // Check for null bytes
            if (strpos($path, "\0") !== false) {
                self::logAssetError("Null byte detected in path: {$path}");
                return false;
            }
            
            // Check path length
            if (strlen($path) > 255) {
                self::logAssetError("Path too long: {$path}");
                return false;
            }
            
            // Check for valid characters (basic validation)
            if (!preg_match('/^[a-zA-Z0-9\/_.-]+$/', $path)) {
                self::logAssetError("Invalid characters in path: {$path}");
                return false;
            }
            
            return true;
        } catch (Exception $e) {
            self::logAssetError("Path validation failed for: {$path}", $e);
            return false;
        }
    }
    
    /**
     * Generate asset URL with comprehensive error handling and validation
     */
    public static function secureUrl(string $path, ?string $fallbackType = null): string
    {
        try {
            // Always validate the path for security (this is the secure method)
            if (!self::validateAssetPath($path)) {
                self::logAssetError("Invalid asset path rejected: {$path}");
                return self::getFallbackUrl($fallbackType ?? 'static');
            }
            
            // For external URLs, return as-is after validation
            if (filter_var($path, FILTER_VALIDATE_URL)) {
                return $path;
            }
            
            // Use detect method for validated paths
            $url = self::detect($path);
            
            // Check if asset exists if validation is enabled
            if (config('assets.validation.check_existence', true)) {
                if (!self::assetExists($path)) {
                    return self::getFallbackUrl($fallbackType ?? 'static');
                }
            }
            
            return $url;
        } catch (Exception $e) {
            self::logAssetError("Secure asset URL generation failed for: {$path}", $e);
            return self::getFallbackUrl($fallbackType ?? 'static');
        }
    }
    
    /**
     * Batch check multiple assets for existence
     */
    public static function checkMultipleAssets(array $paths): array
    {
        $results = [];
        
        foreach ($paths as $path) {
            try {
                $results[$path] = self::assetExists($path);
            } catch (Exception $e) {
                self::logAssetError("Batch asset check failed for: {$path}", $e);
                $results[$path] = false;
            }
        }
        
        return $results;
    }
    
    /**
     * Get asset health status for monitoring
     */
    public static function getAssetHealthStatus(): array
    {
        $status = [
            'storage_accessible' => false,
            'vite_manifest_exists' => false,
            'fallback_assets_exist' => [],
            'errors' => [],
        ];
        
        try {
            // Check storage accessibility
            $status['storage_accessible'] = Storage::disk('public')->exists('');
        } catch (Exception $e) {
            $status['errors'][] = 'Storage disk not accessible: ' . $e->getMessage();
        }
        
        try {
            // Check Vite manifest
            $manifestPath = public_path('build/manifest.json');
            $status['vite_manifest_exists'] = File::exists($manifestPath);
        } catch (Exception $e) {
            $status['errors'][] = 'Vite manifest check failed: ' . $e->getMessage();
        }
        
        // Check fallback assets
        $fallbacks = config('assets.fallbacks', []);
        foreach ($fallbacks as $type => $fallbackPath) {
            if ($fallbackPath) {
                try {
                    $status['fallback_assets_exist'][$type] = self::assetExists($fallbackPath);
                } catch (Exception $e) {
                    $status['fallback_assets_exist'][$type] = false;
                    $status['errors'][] = "Fallback asset check failed for {$type}: " . $e->getMessage();
                }
            }
        }
        
        return $status;
    }
    
    /**
     * Log asset-related errors with context
     */
    private static function logAssetError(string $message, ?Exception $exception = null): void
    {
        if (!config('assets.validation.log_missing_assets', true)) {
            return;
        }
        
        $context = [
            'timestamp' => now()->toISOString(),
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip(),
            'url' => request()->fullUrl(),
        ];
        
        if ($exception) {
            $context['exception'] = [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString(),
            ];
        }
        
        Log::warning($message, $context);
    }
    
    /**
     * Generate blog cover image URL with specialized fallback handling
     */
    public static function blogCover(?string $path): string
    {
        // If no path provided, return fallback immediately
        if (!$path) {
            return self::getFallbackUrl('blog_cover');
        }
        
        try {
            // Use safe storage method for uploaded cover images
            return self::safeStorage($path);
        } catch (Exception $e) {
            if (config('assets.validation.log_missing_assets', true)) {
                Log::warning("Blog cover image generation failed for: {$path}", [
                    'error' => $e->getMessage()
                ]);
            }
            
            return self::getFallbackUrl('blog_cover');
        }
    }
    
    /**
     * Clear asset cache for a specific path or all assets
     */
    public static function clearAssetCache(?string $path = null): bool
    {
        try {
            if ($path) {
                $cacheKey = config('assets.cache.key_prefix') . md5($path);
                return Cache::forget($cacheKey);
            } else {
                // Clear all asset cache entries
                $prefix = config('assets.cache.key_prefix');
                return Cache::flush(); // Note: This clears all cache, consider using tags in production
            }
        } catch (Exception $e) {
            self::logAssetError("Asset cache clear failed" . ($path ? " for: {$path}" : ""), $e);
            return false;
        }
    }

}