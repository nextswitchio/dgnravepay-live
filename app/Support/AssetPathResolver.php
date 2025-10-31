<?php

namespace App\Support;

/**
 * Asset Path Resolver Utility
 * 
 * Provides centralized logic for identifying and resolving different types of asset paths
 */
class AssetPathResolver
{
    /**
     * Storage path patterns that indicate user-uploaded files
     */
    private const STORAGE_PATTERNS = [
        'storage/',
        'uploads/',
        'public/',
        'app/public/',
    ];

    /**
     * Static asset path patterns that should be processed by Vite
     */
    private const STATIC_PATTERNS = [
        'resources/',
        'images/',
        'assets/',
    ];

    /**
     * Common image file extensions
     */
    private const IMAGE_EXTENSIONS = [
        'png', 'jpg', 'jpeg', 'gif', 'svg', 'webp', 'ico', 'bmp', 'tiff'
    ];

    /**
     * Resolve an asset path and return a ResolvedAsset with type information
     */
    public function resolve(string $path): ResolvedAsset
    {
        $originalPath = $path;
        $cleanPath = $this->cleanPath($path);

        // Check for external URLs first
        if ($this->isExternalUrl($path)) {
            return new ResolvedAsset(ResolvedAsset::TYPE_EXTERNAL, $path, $originalPath);
        }

        // Check for storage paths
        if ($this->isStoragePath($cleanPath)) {
            return new ResolvedAsset(ResolvedAsset::TYPE_STORAGE, $cleanPath, $originalPath);
        }

        // Check for static paths
        if ($this->isStaticPath($cleanPath)) {
            return new ResolvedAsset(ResolvedAsset::TYPE_STATIC, $cleanPath, $originalPath);
        }

        // Default to domain asset for unknown paths (maintain backward compatibility)
        return new ResolvedAsset(ResolvedAsset::TYPE_DOMAIN, $cleanPath, $originalPath);
    }

    /**
     * Check if a path points to a storage asset (user uploads)
     */
    public function isStoragePath(string $path): bool
    {
        $cleanPath = $this->cleanPath($path);

        foreach (self::STORAGE_PATTERNS as $pattern) {
            if (str_starts_with($cleanPath, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if a path points to a static asset (should be processed by Vite)
     */
    public function isStaticPath(string $path): bool
    {
        $cleanPath = $this->cleanPath($path);

        // First check if it's a storage path - storage paths take precedence
        if ($this->isStoragePath($cleanPath)) {
            return false;
        }

        // Check for explicit static patterns
        foreach (self::STATIC_PATTERNS as $pattern) {
            if (str_starts_with($cleanPath, $pattern)) {
                return true;
            }
        }

        // Check if it's an image file by extension
        if ($this->hasImageExtension($cleanPath)) {
            return true;
        }

        return false;
    }

    /**
     * Check if a path is an external URL
     */
    public function isExternalUrl(string $path): bool
    {
        return filter_var($path, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Check if a path has an image file extension
     */
    public function hasImageExtension(string $path): bool
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        return in_array($extension, self::IMAGE_EXTENSIONS, true);
    }

    /**
     * Get the file extension from a path
     */
    public function getExtension(string $path): string
    {
        return strtolower(pathinfo($path, PATHINFO_EXTENSION));
    }

    /**
     * Check if a path appears to be a relative path to resources/images
     */
    public function isResourcesImagePath(string $path): bool
    {
        $cleanPath = $this->cleanPath($path);
        
        // If it starts with resources/images, it's definitely a resources image
        if (str_starts_with($cleanPath, 'resources/images/')) {
            return true;
        }

        // If it's just a filename with image extension and no directory separators,
        // it might be intended for resources/images
        if (!str_contains($cleanPath, '/') && $this->hasImageExtension($cleanPath)) {
            return true;
        }

        return false;
    }

    /**
     * Normalize a path for resources/images if it appears to be a bare filename
     */
    public function normalizeResourcesPath(string $path): string
    {
        $cleanPath = $this->cleanPath($path);

        // If it already starts with resources/, return as is
        if (str_starts_with($cleanPath, 'resources/')) {
            return $cleanPath;
        }

        // If it's a bare filename with image extension, prepend resources/images/
        if (!str_contains($cleanPath, '/') && $this->hasImageExtension($cleanPath)) {
            return 'resources/images/' . $cleanPath;
        }

        // If it starts with images/, convert to resources/images/
        if (str_starts_with($cleanPath, 'images/')) {
            return 'resources/' . $cleanPath;
        }

        return $cleanPath;
    }

    /**
     * Clean and normalize a path by removing leading slashes and extra whitespace
     */
    private function cleanPath(string $path): string
    {
        return ltrim(trim($path), '/');
    }
}