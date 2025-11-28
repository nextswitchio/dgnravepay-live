<?php

use App\Helpers\AssetHelper;

if (!function_exists('domain_asset')) {
    /**
     * Generate a domain-aware asset URL with intelligent asset detection
     * 
     * This function automatically detects the asset type and routes to the appropriate
     * URL generation method. It maintains backward compatibility while providing
     * intelligent asset handling.
     */
    function domain_asset(string $path): string
    {
        return AssetHelper::detect($path);
    }
}

if (!function_exists('storage_asset')) {
    /**
     * Generate a correct storage asset URL for user-uploaded files
     * 
     * This function specifically handles storage assets (user uploads) and generates
     * proper URLs using Laravel's Storage facade for correct domain handling.
     */
    function storage_asset(string $path): string
    {
        return AssetHelper::storage($path);
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate a static asset URL using Vite for processed assets
     * 
     * This function handles static assets (images, CSS, JS) that should be processed
     * through Vite's build system. It ensures proper asset versioning and caching.
     */
    function static_asset(string $path): string
    {
        return AssetHelper::static($path);
    }
}

if (!function_exists('safe_asset')) {
    /**
     * Generate a safe asset URL with fallback handling for missing assets
     * 
     * This function provides automatic fallback handling when assets are missing
     * or cannot be loaded. It uses intelligent asset detection and graceful degradation.
     */
    function safe_asset(string $path, ?string $fallbackType = null): string
    {
        return AssetHelper::safeUrl($path, $fallbackType);
    }
}

if (!function_exists('safe_storage_asset')) {
    /**
     * Generate a safe storage asset URL with fallback handling
     * 
     * This function specifically handles storage assets with fallback support
     * for when user-uploaded files are missing or inaccessible.
     */
    function safe_storage_asset(string $path): string
    {
        return AssetHelper::safeStorage($path);
    }
}

if (!function_exists('safe_static_asset')) {
    /**
     * Generate a safe static asset URL with fallback handling
     * 
     * This function handles static assets with fallback support for when
     * Vite-processed assets are missing or cannot be loaded.
     */
    function safe_static_asset(string $path): string
    {
        return AssetHelper::safeStatic($path);
    }
}

if (!function_exists('asset_fallback')) {
    /**
     * Get the configured fallback URL for a specific asset type
     * 
     * This function returns the fallback asset URL for the specified type
     * based on the configuration in config/assets.php.
     */
    function asset_fallback(string $type): string
    {
        return AssetHelper::getFallbackUrl($type);
    }
}

if (!function_exists('validated_asset')) {
    /**
     * Generate a secure asset URL with comprehensive validation and error handling
     * 
     * This function provides the highest level of security and error handling,
     * including path validation, existence checks, and fallback mechanisms.
     */
    function validated_asset(string $path, ?string $fallbackType = null): string
    {
        return \App\Helpers\AssetHelper::secureUrl($path, $fallbackType);
    }
}

if (!function_exists('asset_exists')) {
    /**
     * Check if an asset exists
     * 
     * This function checks whether an asset exists before attempting to generate
     * a URL for it. Useful for conditional asset loading.
     */
    function asset_exists(string $path): bool
    {
        try {
            return AssetHelper::assetExists($path);
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('asset_health')) {
    /**
     * Get asset system health status
     * 
     * This function returns comprehensive health information about the asset
     * system, useful for monitoring and debugging.
     */
    function asset_health(): array
    {
        return AssetHelper::getAssetHealthStatus();
    }
}

if (!function_exists('blog_cover_asset')) {
    /**
     * Generate a blog cover image URL with specialized fallback handling
     * 
     * This function specifically handles blog cover images with appropriate
     * fallback behavior for missing or invalid cover images.
     */
    function blog_cover_asset(?string $path): string
    {
        return AssetHelper::blogCover($path);
    }
}