# Design Document

## Overview

This design addresses the inconsistent asset URL generation issue where some assets load from `/build/assets/` (correct) while others load from `/assets/` (incorrect). The solution involves standardizing asset handling through improved helper functions, updating Vite configuration, and ensuring all asset references use the appropriate method based on asset type.

## Architecture

### Current State Analysis

**Problems Identified:**
1. Mixed usage of `Vite::asset()` and `asset()` helpers
2. `AssetHelper::storage()` generates `/storage/` URLs instead of proper asset URLs
3. Some assets bypass Vite processing entirely
4. Inconsistent domain handling between static and storage assets

**Asset Types:**
- **Static Assets**: Images in `resources/images/` - should use `Vite::asset()`
- **Storage Assets**: User uploads in `storage/app/public/` - should use Laravel's `Storage::url()` or custom helper
- **Build Assets**: Processed by Vite, served from `public/build/assets/`

### Proposed Solution Architecture

```
┌─────────────────┐    ┌──────────────────┐    ┌─────────────────┐
│   Blade Views   │───▶│  Asset Helpers   │───▶│  URL Generation │
└─────────────────┘    └──────────────────┘    └─────────────────┘
                              │
                              ▼
                    ┌──────────────────┐
                    │  Asset Type      │
                    │  Detection       │
                    └──────────────────┘
                              │
                    ┌─────────┴─────────┐
                    ▼                   ▼
            ┌──────────────┐    ┌──────────────┐
            │ Static Assets│    │Storage Assets│
            │ (Vite)       │    │ (Storage)    │
            └──────────────┘    └──────────────┘
```

## Components and Interfaces

### 1. Enhanced AssetHelper Class

**Purpose**: Centralized asset URL generation with intelligent routing based on asset type.

**Methods:**
- `url(string $path): string` - Enhanced domain-aware URL generation
- `storage(string $path): string` - Fixed storage asset URL generation
- `static(string $path): string` - New method for static assets via Vite
- `detect(string $path): string` - Auto-detect asset type and route appropriately

### 2. Improved Helper Functions

**Global Functions:**
- `domain_asset(string $path): string` - Enhanced for auto-detection
- `storage_asset(string $path): string` - Fixed for proper storage URLs
- `static_asset(string $path): string` - New function for static assets

### 3. Vite Configuration Updates

**Enhancements:**
- Ensure all `resources/images/*` are processed
- Configure proper asset manifest generation
- Set up correct public path handling

## Data Models

### Asset Path Resolution Logic

```php
class AssetPathResolver
{
    public function resolve(string $path): ResolvedAsset
    {
        if ($this->isStoragePath($path)) {
            return new ResolvedAsset('storage', $path);
        }
        
        if ($this->isStaticPath($path)) {
            return new ResolvedAsset('static', $path);
        }
        
        if ($this->isExternalUrl($path)) {
            return new ResolvedAsset('external', $path);
        }
        
        // Default to static for resources/images paths
        return new ResolvedAsset('static', $path);
    }
}
```

### Configuration Structure

```php
return [
    'asset_domains' => [
        'static' => env('VITE_ASSET_URL', '/build/assets/'),
        'storage' => env('STORAGE_ASSET_URL', '/storage/'),
    ],
    'fallbacks' => [
        'static' => 'resources/images/placeholder.png',
        'storage' => null,
    ],
];
```

## Error Handling

### Asset Not Found Scenarios

1. **Static Asset Missing**: 
   - Log warning
   - Return fallback image if configured
   - Graceful degradation in views

2. **Storage Asset Missing**:
   - Check if file exists before generating URL
   - Return null or fallback based on configuration
   - Handle in Blade templates with conditional rendering

3. **Invalid Asset Path**:
   - Validate path format
   - Sanitize input to prevent directory traversal
   - Return safe fallback

### Error Recovery Strategies

```php
// In AssetHelper
public static function safeUrl(string $path, ?string $fallback = null): string
{
    try {
        return self::url($path);
    } catch (Exception $e) {
        Log::warning("Asset URL generation failed for: {$path}", ['error' => $e->getMessage()]);
        return $fallback ?? self::getDefaultFallback();
    }
}
```

## Testing Strategy

### Unit Tests

1. **AssetHelper Tests**:
   - Test URL generation for different asset types
   - Verify domain handling (www vs non-www)
   - Test error scenarios and fallbacks

2. **Helper Function Tests**:
   - Test global helper functions
   - Verify backward compatibility
   - Test edge cases and invalid inputs

### Integration Tests

1. **View Rendering Tests**:
   - Test asset URLs in actual Blade templates
   - Verify all images load correctly
   - Test different deployment scenarios

2. **Production Simulation Tests**:
   - Test with Vite build assets
   - Verify storage symlink functionality
   - Test domain variations

### Browser Tests

1. **Asset Loading Tests**:
   - Verify no 404 errors for images
   - Test across different pages
   - Validate cache headers and performance

## Implementation Phases

### Phase 1: Core Infrastructure
- Update AssetHelper class with new methods
- Create asset path resolver
- Add configuration options

### Phase 2: Helper Function Updates
- Enhance existing helper functions
- Add new static_asset() helper
- Maintain backward compatibility

### Phase 3: View Updates
- Audit all Blade templates
- Update asset references systematically
- Test each page for proper loading

### Phase 4: Vite Configuration
- Update vite.config.js for comprehensive asset processing
- Ensure proper manifest generation
- Configure build optimization

### Phase 5: Testing and Validation
- Run comprehensive test suite
- Perform manual testing across all pages
- Validate production deployment