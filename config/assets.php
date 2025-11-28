<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Asset Domain Configuration
    |--------------------------------------------------------------------------
    |
    | These settings control how asset URLs are generated for different
    | asset types. Static assets are processed by Vite, while storage
    | assets are user-uploaded files.
    |
    */

    'domains' => [
        'static' => env('VITE_ASSET_URL', '/build/assets/'),
        'storage' => env('STORAGE_ASSET_URL', '/storage/'),
        'base' => env('ASSET_URL', env('APP_URL', 'http://localhost')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset URL Patterns
    |--------------------------------------------------------------------------
    |
    | Define URL patterns for different asset types to ensure consistent
    | URL generation across the application.
    |
    */

    'patterns' => [
        'static_extensions' => ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp', 'ico'],
        'storage_prefixes' => ['storage/', 'app/public/', 'public/'],
        'external_protocols' => ['http://', 'https://', '//'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Fallback Assets
    |--------------------------------------------------------------------------
    |
    | Configure fallback assets to use when the requested asset is missing
    | or cannot be loaded. Set to null to disable fallback handling.
    |
    */

    'fallbacks' => [
        'static' => env('ASSET_FALLBACK_STATIC', 'resources/images/logo.svg'),
        'storage' => env('ASSET_FALLBACK_STORAGE', null),
        'profile' => env('ASSET_FALLBACK_PROFILE', 'resources/images/user.svg'),
        'blog_cover' => env('ASSET_FALLBACK_BLOG_COVER', 'resources/images/article 1.jpg'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset Validation
    |--------------------------------------------------------------------------
    |
    | Configure asset validation settings including file existence checks
    | and security validation.
    |
    */

    'validation' => [
        'check_existence' => env('ASSET_CHECK_EXISTENCE', true),
        'check_external_assets' => env('ASSET_CHECK_EXTERNAL', false),
        'log_missing_assets' => env('ASSET_LOG_MISSING', true),
        'strict_mode' => env('ASSET_STRICT_MODE', false),
        'validate_paths' => env('ASSET_VALIDATE_PATHS', true),
        'max_path_length' => env('ASSET_MAX_PATH_LENGTH', 255),
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Configure caching for asset URL generation to improve performance.
    |
    */

    'cache' => [
        'enabled' => env('ASSET_CACHE_ENABLED', true),
        'ttl' => env('ASSET_CACHE_TTL', 3600), // 1 hour
        'key_prefix' => 'asset_url_',
    ],

];