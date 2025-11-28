# Asset Configuration System

This document explains how to use the asset configuration system for handling asset URLs with fallback support.

## Configuration

The asset configuration is located in `config/assets.php` and includes:

### Domain Configuration
```php
'domains' => [
    'static' => env('VITE_ASSET_URL', '/build/assets/'),
    'storage' => env('STORAGE_ASSET_URL', '/storage/'),
    'base' => env('ASSET_URL', env('APP_URL', 'http://localhost')),
],
```

### Fallback Assets
```php
'fallbacks' => [
    'static' => env('ASSET_FALLBACK_STATIC', 'resources/images/logo.svg'),
    'storage' => env('ASSET_FALLBACK_STORAGE', null),
    'profile' => env('ASSET_FALLBACK_PROFILE', 'resources/images/user.svg'),
    'blog_cover' => env('ASSET_FALLBACK_BLOG_COVER', 'resources/images/article 1.jpg'),
],
```

## Environment Variables

Add these variables to your `.env` file:

```env
# Asset Configuration
VITE_ASSET_URL=/build/assets/
STORAGE_ASSET_URL=/storage/
ASSET_FALLBACK_STATIC=resources/images/logo.svg
ASSET_FALLBACK_STORAGE=
ASSET_FALLBACK_PROFILE=resources/images/user.svg
ASSET_FALLBACK_BLOG_COVER=resources/images/article 1.jpg
ASSET_CHECK_EXISTENCE=true
ASSET_LOG_MISSING=true
ASSET_STRICT_MODE=false
ASSET_CACHE_ENABLED=true
ASSET_CACHE_TTL=3600
```

## Helper Functions

### Safe Asset Functions (with fallback support)

```php
// Generate safe asset URL with automatic fallback
$url = safe_asset('path/to/image.png');

// Generate safe asset URL with specific fallback type
$url = safe_asset('path/to/profile.png', 'profile');

// Generate safe storage asset URL
$url = safe_storage_asset('uploads/image.jpg');

// Generate safe static asset URL
$url = safe_static_asset('logo.png');

// Get fallback URL for specific type
$fallbackUrl = asset_fallback('profile');
```

### Secure Asset Functions (with validation and error handling)

```php
// Generate validated asset URL with comprehensive security checks
$url = validated_asset('path/to/image.png');

// Generate validated asset URL with specific fallback type
$url = validated_asset('path/to/profile.png', 'profile');

// Check if an asset exists before using it
$exists = asset_exists('path/to/image.png');

// Get asset system health status for monitoring
$health = asset_health();
```

### Regular Asset Functions

```php
// Intelligent asset detection and routing
$url = domain_asset('path/to/asset.png');

// Storage asset URL generation
$url = storage_asset('uploads/file.jpg');

// Static asset URL generation (via Vite)
$url = static_asset('logo.png');
```

## Blade Component

Use the safe image component for automatic fallback handling:

```blade
<x-safe-image 
    src="path/to/image.png" 
    fallback="profile" 
    alt="Profile Image" 
    class="w-32 h-32 rounded-full"
/>
```

## AssetHelper Class Methods

```php
use App\Helpers\AssetHelper;

// Safe URL generation with fallback
$url = AssetHelper::safeUrl('path/to/asset.png', 'profile');

// Safe storage URL generation
$url = AssetHelper::safeStorage('uploads/file.jpg');

// Safe static URL generation
$url = AssetHelper::safeStatic('logo.png');

// Secure URL generation with validation
$url = AssetHelper::secureUrl('path/to/asset.png', 'profile');

// Check if asset exists
$exists = AssetHelper::assetExists('path/to/asset.png');

// Validate asset path for security
$isValid = AssetHelper::validateAssetPath('path/to/asset.png');

// Check multiple assets at once
$results = AssetHelper::checkMultipleAssets(['image1.png', 'image2.jpg']);

// Get system health status
$health = AssetHelper::getAssetHealthStatus();

// Clear asset cache
AssetHelper::clearAssetCache('path/to/asset.png'); // specific asset
AssetHelper::clearAssetCache(); // all assets

// Get fallback URL
$fallbackUrl = AssetHelper::getFallbackUrl('blog_cover');
```

## Asset Types

- **static**: Images and assets processed by Vite (resources/images/)
- **storage**: User-uploaded files (storage/app/public/)
- **profile**: User profile images
- **blog_cover**: Blog post cover images

## Error Handling

The system includes comprehensive error handling:

- Missing assets automatically use configured fallbacks
- Asset existence checking (configurable)
- Logging of missing assets (configurable)
- Graceful degradation with transparent pixel fallback as last resort
- Path validation to prevent directory traversal attacks
- Exception handling with detailed logging
- External asset validation (optional)
- Batch asset checking for performance
- Asset health monitoring for system status

## Validation and Security

The system includes comprehensive validation and security features:

- **Path Validation**: Prevents directory traversal attacks (../)
- **Null Byte Protection**: Blocks null byte injection attempts
- **Path Length Limits**: Configurable maximum path length
- **Character Validation**: Ensures only safe characters in paths
- **External Asset Checking**: Optional validation of external URLs (with caching)
- **Fallback Asset Verification**: Ensures fallback assets exist
- **Storage Accessibility**: Validates storage disk accessibility
- **Vite Manifest Checking**: Verifies build system integration

### Configuration Options

```php
'validation' => [
    'check_existence' => env('ASSET_CHECK_EXISTENCE', true),
    'check_external_assets' => env('ASSET_CHECK_EXTERNAL', false),
    'log_missing_assets' => env('ASSET_LOG_MISSING', true),
    'strict_mode' => env('ASSET_STRICT_MODE', false),
    'validate_paths' => env('ASSET_VALIDATE_PATHS', true),
    'max_path_length' => env('ASSET_MAX_PATH_LENGTH', 255),
],
```

## Performance

- Configurable caching for asset URL generation
- Existence checking can be disabled in production
- Minimal performance impact with smart defaults