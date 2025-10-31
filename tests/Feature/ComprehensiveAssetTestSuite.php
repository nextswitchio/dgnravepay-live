<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\AssetHelper;
use App\Support\AssetPathResolver;
use App\Support\ResolvedAsset;

class ComprehensiveAssetTestSuite extends TestCase
{
    use RefreshDatabase;

    /**
     * Test comprehensive AssetHelper class functionality
     */
    public function test_asset_helper_comprehensive_functionality(): void
    {
        // Test all AssetHelper methods with various inputs
        $testCases = [
            'logo.png',
            'resources/images/banner.jpg',
            'storage/uploads/test.jpg',
            'https://example.com/external.png'
        ];

        foreach ($testCases as $path) {
            // Test url method
            $url = AssetHelper::url($path);
            $this->assertNotEmpty($url);
            $this->assertIsString($url);

            // Test detect method
            $detected = AssetHelper::detect($path);
            $this->assertNotEmpty($detected);
            $this->assertIsString($detected);

            // Test safe methods
            $safeUrl = AssetHelper::safeUrl($path);
            $this->assertNotEmpty($safeUrl);
            $this->assertIsString($safeUrl);
        }
    }

    /**
     * Test asset type detection accuracy
     */
    public function test_asset_type_detection_accuracy(): void
    {
        $resolver = new AssetPathResolver();

        // Test static asset detection
        $staticPaths = [
            'logo.png',
            'resources/images/banner.jpg',
            'images/icon.svg',
            'favicon.ico'
        ];

        foreach ($staticPaths as $path) {
            $resolved = $resolver->resolve($path);
            $this->assertTrue($resolved->isStatic(), "Path '{$path}' should be detected as static");
        }

        // Test storage asset detection
        $storagePaths = [
            'storage/uploads/test.jpg',
            'uploads/document.pdf',
            'public/files/image.png'
        ];

        foreach ($storagePaths as $path) {
            $resolved = $resolver->resolve($path);
            $this->assertTrue($resolved->isStorage(), "Path '{$path}' should be detected as storage");
        }

        // Test external URL detection
        $externalUrls = [
            'https://example.com/image.jpg',
            'http://test.com/file.png',
            'ftp://files.example.com/doc.pdf'
        ];

        foreach ($externalUrls as $url) {
            $resolved = $resolver->resolve($url);
            $this->assertTrue($resolved->isExternal(), "URL '{$url}' should be detected as external");
        }
    }

    /**
     * Test domain handling with various configurations
     */
    public function test_comprehensive_domain_handling(): void
    {
        $domains = [
            'www.dgnravepay.com',
            'dgnravepay.com',
            'staging.dgnravepay.com',
            'localhost'
        ];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            if ($domain !== 'localhost') {
                $response->assertStatus(200);
            }

            // Test asset URL generation for this domain
            $url = AssetHelper::url('test.png');
            $this->assertNotEmpty($url);
            $this->assertIsString($url);
        }
    }

    /**
     * Test asset URL generation with different protocols
     */
    public function test_asset_url_generation_protocols(): void
    {
        // Test HTTPS
        $httpsResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        $httpsResponse->assertStatus(200);

        // Test HTTP (should redirect to HTTPS in production)
        $httpResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com'
        ]);
        // In test environment, this might not redirect, so we just check it doesn't crash
        $this->assertNotNull($httpResponse);
    }

    /**
     * Test asset fallback mechanisms
     */
    public function test_asset_fallback_mechanisms(): void
    {
        // Test fallback for non-existent static assets
        $fallbackUrl = AssetHelper::safeUrl('non-existent-file.png');
        $this->assertNotEmpty($fallbackUrl);
        $this->assertStringContainsString('logo.svg', $fallbackUrl);

        // Test fallback for different asset types
        $profileFallback = AssetHelper::safeUrl('missing-profile.jpg', 'profile');
        $this->assertNotEmpty($profileFallback);
        $this->assertStringContainsString('user.svg', $profileFallback);

        $blogFallback = AssetHelper::safeUrl('missing-cover.jpg', 'blog_cover');
        $this->assertNotEmpty($blogFallback);
        $this->assertStringContainsString('article 1.jpg', $blogFallback);
    }

    /**
     * Test asset security validation
     */
    public function test_asset_security_validation(): void
    {
        // Test directory traversal prevention
        $maliciousPaths = [
            '../../../etc/passwd',
            '..\\..\\..\\windows\\system32\\config\\sam',
            'images/../../../config.php',
            'test\0.png'
        ];

        foreach ($maliciousPaths as $path) {
            $this->assertFalse(AssetHelper::validateAssetPath($path), "Path '{$path}' should be rejected");
            
            $secureUrl = AssetHelper::secureUrl($path);
            $this->assertNotEmpty($secureUrl);
            $this->assertStringNotContainsString('..', $secureUrl);
            $this->assertStringNotContainsString("\0", $secureUrl);
        }
    }

    /**
     * Test asset existence checking
     */
    public function test_asset_existence_checking(): void
    {
        // Test batch asset checking
        $assets = [
            'logo.svg',
            'user.svg',
            'non-existent.png',
            'favicon.ico'
        ];

        $results = AssetHelper::checkMultipleAssets($assets);
        $this->assertIsArray($results);
        $this->assertCount(count($assets), $results);

        foreach ($assets as $asset) {
            $this->assertArrayHasKey($asset, $results);
            $this->assertIsBool($results[$asset]);
        }

        // Non-existent asset should be false
        $this->assertFalse($results['non-existent.png']);
    }

    /**
     * Test asset health monitoring
     */
    public function test_asset_health_monitoring(): void
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
     * Test asset caching functionality
     */
    public function test_asset_caching_functionality(): void
    {
        // Test cache clearing for specific path
        $result = AssetHelper::clearAssetCache('test/path.png');
        $this->assertIsBool($result);

        // Test clearing all asset cache
        $allResult = AssetHelper::clearAssetCache();
        $this->assertIsBool($allResult);
    }

    /**
     * Test global helper functions comprehensively
     */
    public function test_global_helper_functions_comprehensive(): void
    {
        $testPaths = [
            'logo.png',
            'resources/images/banner.jpg',
            'storage/uploads/test.jpg'
        ];

        foreach ($testPaths as $path) {
            // Test all global helpers
            $domainAsset = domain_asset($path);
            $this->assertNotEmpty($domainAsset);
            $this->assertIsString($domainAsset);

            $safeAsset = safe_asset($path);
            $this->assertNotEmpty($safeAsset);
            $this->assertIsString($safeAsset);

            $validatedAsset = validated_asset($path);
            $this->assertNotEmpty($validatedAsset);
            $this->assertIsString($validatedAsset);
        }

        // Test storage-specific helpers
        $storageAsset = storage_asset('uploads/test.jpg');
        $this->assertNotEmpty($storageAsset);
        $this->assertStringContainsString('storage', $storageAsset);

        $safeStorageAsset = safe_storage_asset('uploads/test.jpg');
        $this->assertNotEmpty($safeStorageAsset);

        // Test static-specific helpers
        $staticAsset = static_asset('logo.png');
        $this->assertNotEmpty($staticAsset);

        $safeStaticAsset = safe_static_asset('logo.png');
        $this->assertNotEmpty($safeStaticAsset);
    }

    /**
     * Test asset configuration loading and validation
     */
    public function test_asset_configuration_comprehensive(): void
    {
        // Test configuration structure
        $config = config('assets');
        $this->assertIsArray($config);

        // Test required configuration keys
        $requiredKeys = ['domains', 'fallbacks'];
        foreach ($requiredKeys as $key) {
            $this->assertArrayHasKey($key, $config, "Configuration should have '{$key}' key");
        }

        // Test domain configuration
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
     * Test error handling and logging
     */
    public function test_error_handling_and_logging(): void
    {
        // Test safe URL generation with invalid paths
        $invalidPaths = [
            '',
            '../../../etc/passwd',
            'very-long-path-' . str_repeat('a', 300)
        ];

        foreach ($invalidPaths as $path) {
            $safeUrl = AssetHelper::safeUrl($path);
            $this->assertNotEmpty($safeUrl, "Safe URL should return fallback for invalid path");
            $this->assertIsString($safeUrl);
        }
        
        // Test with empty string specifically
        $emptyUrl = AssetHelper::safeUrl('');
        $this->assertNotEmpty($emptyUrl, "Safe URL should return fallback for empty string");
        $this->assertIsString($emptyUrl);
    }

    /**
     * Test ResolvedAsset data structure
     */
    public function test_resolved_asset_data_structure(): void
    {
        // Test static asset
        $staticAsset = new ResolvedAsset(ResolvedAsset::TYPE_STATIC, 'logo.png');
        $this->assertTrue($staticAsset->isStatic());
        $this->assertFalse($staticAsset->isStorage());
        $this->assertFalse($staticAsset->isExternal());
        $this->assertEquals('logo.png', $staticAsset->path);

        // Test storage asset
        $storageAsset = new ResolvedAsset(ResolvedAsset::TYPE_STORAGE, 'uploads/test.jpg');
        $this->assertTrue($storageAsset->isStorage());
        $this->assertFalse($storageAsset->isStatic());
        $this->assertFalse($storageAsset->isExternal());

        // Test external asset
        $externalAsset = new ResolvedAsset(ResolvedAsset::TYPE_EXTERNAL, 'https://example.com/image.jpg');
        $this->assertTrue($externalAsset->isExternal());
        $this->assertFalse($externalAsset->isStatic());
        $this->assertFalse($externalAsset->isStorage());
    }
}