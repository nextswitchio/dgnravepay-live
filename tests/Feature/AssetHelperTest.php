<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\AssetHelper;

class AssetHelperTest extends TestCase
{
    /**
     * Test AssetHelper class methods
     */
    public function test_asset_helper_class_methods(): void
    {
        // Test AssetHelper::url method
        $url = AssetHelper::url('test/image.jpg');
        $this->assertStringContainsString('test/image.jpg', $url);
        $this->assertStringContainsString('https://', $url);
        
        // Test AssetHelper::storage method
        $storageUrl = AssetHelper::storage('uploads/test.jpg');
        $this->assertStringContainsString('storage/uploads/test.jpg', $storageUrl);
        $this->assertStringContainsString('https://', $storageUrl);
    }

    /**
     * Test that asset URLs are generated with correct domain
     */
    public function test_asset_urls_contain_domain(): void
    {
        // Make a request to set domain context
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        
        $response->assertStatus(200);
        
        // Test URL generation (should normalize to non-www based on our middleware)
        $url = AssetHelper::url('test.css');
        $this->assertStringContainsString('dgnravepay.com', $url);
        
        $storageUrl = AssetHelper::storage('test.jpg');
        $this->assertStringContainsString('dgnravepay.com', $storageUrl);
    }

    /**
     * Test asset URL generation on non-www domain
     */
    public function test_asset_urls_non_www_domain(): void
    {
        // Make a request to set domain context
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        
        $response->assertStatus(200);
        
        // Test URL generation
        $url = AssetHelper::url('test.css');
        $this->assertStringContainsString('dgnravepay.com', $url);
        
        $storageUrl = AssetHelper::storage('test.jpg');
        $this->assertStringContainsString('dgnravepay.com', $storageUrl);
    }

    /**
     * Test static asset URL generation using Vite
     */
    public function test_static_asset_url_generation(): void
    {
        // Test static method with image file
        $staticUrl = AssetHelper::static('logo.png');
        $this->assertNotEmpty($staticUrl);
        
        // Test with resources path
        $resourceUrl = AssetHelper::static('resources/images/logo.png');
        $this->assertNotEmpty($resourceUrl);
    }

    /**
     * Test asset type detection and routing
     */
    public function test_asset_type_detection(): void
    {
        // Test storage path detection
        $storageUrl = AssetHelper::detect('storage/uploads/test.jpg');
        $this->assertNotEmpty($storageUrl);
        
        // Test static path detection
        $staticUrl = AssetHelper::detect('logo.png');
        $this->assertNotEmpty($staticUrl);
        
        // Test resources path detection
        $resourceUrl = AssetHelper::detect('resources/images/test.png');
        $this->assertNotEmpty($resourceUrl);
        
        // Test external URL passthrough
        $externalUrl = AssetHelper::detect('https://example.com/image.jpg');
        $this->assertEquals('https://example.com/image.jpg', $externalUrl);
    }

    /**
     * Test storage asset URL uses Laravel Storage facade
     */
    public function test_storage_asset_uses_storage_facade(): void
    {
        $storageUrl = AssetHelper::storage('test.jpg');
        
        // Should use Storage facade which generates proper storage URLs
        $this->assertStringContainsString('storage', $storageUrl);
        $this->assertNotEmpty($storageUrl);
    }

    /**
     * Test safe asset URL generation with fallback handling
     */
    public function test_safe_asset_url_generation(): void
    {
        // Test safe URL generation for existing asset
        $safeUrl = AssetHelper::safeUrl('logo.svg');
        $this->assertNotEmpty($safeUrl);
        
        // Test safe URL generation for non-existent asset (should return fallback)
        $fallbackUrl = AssetHelper::safeUrl('nonexistent.png');
        $this->assertNotEmpty($fallbackUrl);
        $this->assertStringContainsString('logo.svg', $fallbackUrl);
    }

    /**
     * Test safe storage asset URL generation
     */
    public function test_safe_storage_asset_url_generation(): void
    {
        // Test safe storage URL for non-existent file (should return fallback)
        $safeStorageUrl = AssetHelper::safeStorage('nonexistent.jpg');
        $this->assertNotEmpty($safeStorageUrl);
    }

    /**
     * Test safe static asset URL generation
     */
    public function test_safe_static_asset_url_generation(): void
    {
        // Test safe static URL for existing asset
        $safeStaticUrl = AssetHelper::safeStatic('logo.svg');
        $this->assertNotEmpty($safeStaticUrl);
        
        // Test safe static URL for non-existent asset (should return fallback)
        $fallbackStaticUrl = AssetHelper::safeStatic('nonexistent.png');
        $this->assertNotEmpty($fallbackStaticUrl);
    }

    /**
     * Test fallback URL generation for different asset types
     */
    public function test_fallback_url_generation(): void
    {
        // Test static fallback
        $staticFallback = AssetHelper::getFallbackUrl('static');
        $this->assertNotEmpty($staticFallback);
        $this->assertStringContainsString('logo.svg', $staticFallback);
        
        // Test profile fallback
        $profileFallback = AssetHelper::getFallbackUrl('profile');
        $this->assertNotEmpty($profileFallback);
        $this->assertStringContainsString('user.svg', $profileFallback);
        
        // Test blog cover fallback
        $blogFallback = AssetHelper::getFallbackUrl('blog_cover');
        $this->assertNotEmpty($blogFallback);
        $this->assertStringContainsString('article 1.jpg', $blogFallback);
    }

    /**
     * Test asset configuration loading
     */
    public function test_asset_configuration_loading(): void
    {
        // Test that asset configuration is loaded
        $domains = config('assets.domains');
        $this->assertIsArray($domains);
        $this->assertArrayHasKey('static', $domains);
        $this->assertArrayHasKey('storage', $domains);
        $this->assertArrayHasKey('base', $domains);
        
        // Test fallback configuration
        $fallbacks = config('assets.fallbacks');
        $this->assertIsArray($fallbacks);
        $this->assertArrayHasKey('static', $fallbacks);
        $this->assertArrayHasKey('profile', $fallbacks);
        $this->assertArrayHasKey('blog_cover', $fallbacks);
    }

    /**
     * Test asset path validation
     */
    public function test_asset_path_validation(): void
    {
        // Test valid paths
        $this->assertTrue(AssetHelper::validateAssetPath('images/logo.png'));
        $this->assertTrue(AssetHelper::validateAssetPath('css/app.css'));
        $this->assertTrue(AssetHelper::validateAssetPath('js/app.js'));
        
        // Test invalid paths (directory traversal)
        $this->assertFalse(AssetHelper::validateAssetPath('../../../etc/passwd'));
        $this->assertFalse(AssetHelper::validateAssetPath('images/../../../config.php'));
        
        // Test paths with null bytes
        $this->assertFalse(AssetHelper::validateAssetPath("images/test\0.png"));
        
        // Test overly long paths
        $longPath = str_repeat('a', 300);
        $this->assertFalse(AssetHelper::validateAssetPath($longPath));
    }

    /**
     * Test secure asset URL generation
     */
    public function test_secure_asset_url_generation(): void
    {
        // Test secure URL for valid path
        $secureUrl = AssetHelper::secureUrl('logo.svg');
        $this->assertNotEmpty($secureUrl);
        
        // Test secure URL for invalid path (should return fallback)
        $invalidUrl = AssetHelper::secureUrl('../../../etc/passwd');
        $this->assertNotEmpty($invalidUrl);
        $this->assertStringContainsString('logo.svg', $invalidUrl); // Should be fallback
    }

    /**
     * Test asset existence checking
     */
    public function test_asset_existence_checking(): void
    {
        // Test existing asset (logo.svg should exist in resources/images)
        $exists = AssetHelper::assetExists('logo.svg');
        $this->assertIsBool($exists);
        
        // Test non-existent asset
        $notExists = AssetHelper::assetExists('definitely-does-not-exist.png');
        $this->assertFalse($notExists);
    }

    /**
     * Test batch asset checking
     */
    public function test_batch_asset_checking(): void
    {
        $paths = [
            'logo.svg',
            'nonexistent.png',
            'user.svg'
        ];
        
        $results = AssetHelper::checkMultipleAssets($paths);
        
        $this->assertIsArray($results);
        $this->assertCount(3, $results);
        $this->assertArrayHasKey('logo.svg', $results);
        $this->assertArrayHasKey('nonexistent.png', $results);
        $this->assertArrayHasKey('user.svg', $results);
        
        // Non-existent asset should be false
        $this->assertFalse($results['nonexistent.png']);
    }

    /**
     * Test asset health status
     */
    public function test_asset_health_status(): void
    {
        $health = AssetHelper::getAssetHealthStatus();
        
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

    /**
     * Test asset cache clearing
     */
    public function test_asset_cache_clearing(): void
    {
        // Test clearing cache for specific path
        $result = AssetHelper::clearAssetCache('test/path.png');
        $this->assertIsBool($result);
        
        // Test clearing all asset cache
        $allResult = AssetHelper::clearAssetCache();
        $this->assertIsBool($allResult);
    }
}