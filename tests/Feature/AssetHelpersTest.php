<?php

namespace Tests\Feature;

use Tests\TestCase;

class AssetHelpersTest extends TestCase
{
    /**
     * Test global asset helper functions
     */
    public function test_global_asset_helpers(): void
    {
        // Test domain_asset helper
        $domainAssetUrl = domain_asset('test.png');
        $this->assertNotEmpty($domainAssetUrl);
        
        // Test storage_asset helper
        $storageAssetUrl = storage_asset('test.jpg');
        $this->assertNotEmpty($storageAssetUrl);
        $this->assertStringContainsString('storage', $storageAssetUrl);
        
        // Test static_asset helper
        $staticAssetUrl = static_asset('logo.svg');
        $this->assertNotEmpty($staticAssetUrl);
    }

    /**
     * Test safe asset helper functions
     */
    public function test_safe_asset_helpers(): void
    {
        // Test safe_asset helper
        $safeAssetUrl = safe_asset('nonexistent.png');
        $this->assertNotEmpty($safeAssetUrl);
        
        // Test safe_storage_asset helper
        $safeStorageUrl = safe_storage_asset('nonexistent.jpg');
        $this->assertNotEmpty($safeStorageUrl);
        
        // Test safe_static_asset helper
        $safeStaticUrl = safe_static_asset('nonexistent.png');
        $this->assertNotEmpty($safeStaticUrl);
    }

    /**
     * Test asset_fallback helper function
     */
    public function test_asset_fallback_helper(): void
    {
        // Test static fallback
        $staticFallback = asset_fallback('static');
        $this->assertNotEmpty($staticFallback);
        $this->assertStringContainsString('logo.svg', $staticFallback);
        
        // Test profile fallback
        $profileFallback = asset_fallback('profile');
        $this->assertNotEmpty($profileFallback);
        $this->assertStringContainsString('user.svg', $profileFallback);
        
        // Test blog cover fallback
        $blogFallback = asset_fallback('blog_cover');
        $this->assertNotEmpty($blogFallback);
        $this->assertStringContainsString('article 1.jpg', $blogFallback);
    }

    /**
     * Test safe asset helpers with specific fallback types
     */
    public function test_safe_asset_helpers_with_fallback_types(): void
    {
        // Test safe_asset with specific fallback type
        $profileAssetUrl = safe_asset('nonexistent-profile.png', 'profile');
        $this->assertNotEmpty($profileAssetUrl);
        $this->assertStringContainsString('user.svg', $profileAssetUrl);
        
        // Test safe_asset with blog cover fallback
        $blogAssetUrl = safe_asset('nonexistent-cover.jpg', 'blog_cover');
        $this->assertNotEmpty($blogAssetUrl);
        $this->assertStringContainsString('article 1.jpg', $blogAssetUrl);
    }

    /**
     * Test validated_asset helper function
     */
    public function test_validated_asset_helper(): void
    {
        // Test validated asset with valid path
        $validatedUrl = validated_asset('logo.svg');
        $this->assertNotEmpty($validatedUrl);
        
        // Test validated asset with invalid path (should return fallback)
        // The validated_asset function should reject directory traversal attempts
        $invalidValidatedUrl = validated_asset('../../../etc/passwd');
        $this->assertNotEmpty($invalidValidatedUrl);
        // Should not contain the invalid path
        $this->assertStringNotContainsString('../../../etc/passwd', $invalidValidatedUrl);
        // Should be a valid URL (either Vite processed or data URL)
        $this->assertTrue(
            filter_var($invalidValidatedUrl, FILTER_VALIDATE_URL) !== false ||
            str_starts_with($invalidValidatedUrl, 'data:')
        );
        
        // Test validated asset with fallback type
        $validatedProfileUrl = validated_asset('invalid-path', 'profile');
        $this->assertNotEmpty($validatedProfileUrl);
        // Should be a valid URL or data URL
        $this->assertTrue(
            filter_var($validatedProfileUrl, FILTER_VALIDATE_URL) !== false ||
            str_starts_with($validatedProfileUrl, 'data:')
        );
    }

    /**
     * Test asset_exists helper function
     */
    public function test_asset_exists_helper(): void
    {
        // Test existing asset
        $exists = asset_exists('logo.svg');
        $this->assertIsBool($exists);
        
        // Test non-existent asset
        $notExists = asset_exists('definitely-does-not-exist.png');
        $this->assertFalse($notExists);
        
        // Test invalid path
        $invalidExists = asset_exists('../../../etc/passwd');
        $this->assertFalse($invalidExists);
    }

    /**
     * Test asset_health helper function
     */
    public function test_asset_health_helper(): void
    {
        $health = asset_health();
        
        $this->assertIsArray($health);
        $this->assertArrayHasKey('storage_accessible', $health);
        $this->assertArrayHasKey('vite_manifest_exists', $health);
        $this->assertArrayHasKey('fallback_assets_exist', $health);
        $this->assertArrayHasKey('errors', $health);
        
        $this->assertIsBool($health['storage_accessible']);
        $this->assertIsBool($health['vite_manifest_exists']);
        $this->assertIsArray($health['fallback_assets_exist']);
        $this->assertIsArray($health['errors']);
    }
}