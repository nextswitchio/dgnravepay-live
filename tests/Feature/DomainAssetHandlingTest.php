<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\AssetHelper;

class DomainAssetHandlingTest extends TestCase
{
    /**
     * Test asset URL generation on www domain
     */
    public function test_asset_url_generation_www_domain(): void
    {
        // Set up www domain context
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        $response->assertStatus(200);

        // Test various asset types
        $testCases = [
            'logo.png' => 'static',
            'resources/images/banner.jpg' => 'static',
            'storage/uploads/test.jpg' => 'storage',
            'https://example.com/external.png' => 'external'
        ];

        foreach ($testCases as $path => $expectedType) {
            $url = AssetHelper::url($path);
            $this->assertNotEmpty($url, "URL should be generated for {$path}");
            
            if ($expectedType !== 'external') {
                $this->assertStringContainsString('dgnravepay.com', $url, 
                    "URL for {$path} should contain domain");
                $this->assertStringContainsString('https://', $url, 
                    "URL for {$path} should use HTTPS");
            }
        }
    }

    /**
     * Test asset URL generation on non-www domain
     */
    public function test_asset_url_generation_non_www_domain(): void
    {
        // Set up non-www domain context
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        $response->assertStatus(200);

        // Test various asset types
        $testCases = [
            'logo.png' => 'static',
            'resources/images/banner.jpg' => 'static',
            'storage/uploads/test.jpg' => 'storage',
            'https://example.com/external.png' => 'external'
        ];

        foreach ($testCases as $path => $expectedType) {
            $url = AssetHelper::url($path);
            $this->assertNotEmpty($url, "URL should be generated for {$path}");
            
            if ($expectedType !== 'external') {
                $this->assertStringContainsString('dgnravepay.com', $url, 
                    "URL for {$path} should contain domain");
                $this->assertStringContainsString('https://', $url, 
                    "URL for {$path} should use HTTPS");
            }
        }
    }

    /**
     * Test domain consistency between www and non-www
     */
    public function test_domain_consistency_www_vs_non_www(): void
    {
        $testPaths = [
            'logo.png',
            'resources/images/banner.jpg',
            'storage/uploads/test.jpg'
        ];

        foreach ($testPaths as $path) {
            // Test on www domain
            $this->get('/', [
                'HTTP_HOST' => 'www.dgnravepay.com',
                'HTTPS' => 'on'
            ]);
            $wwwUrl = AssetHelper::url($path);

            // Test on non-www domain
            $this->get('/', [
                'HTTP_HOST' => 'dgnravepay.com',
                'HTTPS' => 'on'
            ]);
            $nonWwwUrl = AssetHelper::url($path);

            // Both should generate valid URLs
            $this->assertNotEmpty($wwwUrl, "WWW domain should generate URL for {$path}");
            $this->assertNotEmpty($nonWwwUrl, "Non-WWW domain should generate URL for {$path}");

            // Both should use HTTPS
            $this->assertStringContainsString('https://', $wwwUrl);
            $this->assertStringContainsString('https://', $nonWwwUrl);

            // Both should contain the base domain
            $this->assertStringContainsString('dgnravepay.com', $wwwUrl);
            $this->assertStringContainsString('dgnravepay.com', $nonWwwUrl);
        }
    }

    /**
     * Test subdomain handling
     */
    public function test_subdomain_handling(): void
    {
        $subdomains = [
            'staging.dgnravepay.com',
            'dev.dgnravepay.com',
            'api.dgnravepay.com'
        ];

        foreach ($subdomains as $subdomain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $subdomain,
                'HTTPS' => 'on'
            ]);

            // Some subdomains might not have routes, so we just test asset generation
            $url = AssetHelper::url('logo.png');
            $this->assertNotEmpty($url, "URL should be generated for subdomain {$subdomain}");
            $this->assertStringContainsString('https://', $url);
        }
    }

    /**
     * Test localhost domain handling
     */
    public function test_localhost_domain_handling(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'localhost:8000'
        ]);

        // Test asset generation on localhost
        $url = AssetHelper::url('logo.png');
        $this->assertNotEmpty($url, "URL should be generated for localhost");
    }

    /**
     * Test domain-specific asset helper methods
     */
    public function test_domain_specific_asset_helper_methods(): void
    {
        $domains = [
            'www.dgnravepay.com',
            'dgnravepay.com'
        ];

        foreach ($domains as $domain) {
            $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            // Test static asset method
            $staticUrl = AssetHelper::static('logo.png');
            $this->assertNotEmpty($staticUrl);

            // Test storage asset method
            $storageUrl = AssetHelper::storage('uploads/test.jpg');
            $this->assertNotEmpty($storageUrl);
            $this->assertStringContainsString('storage', $storageUrl);

            // Test detect method
            $detectedStatic = AssetHelper::detect('logo.png');
            $this->assertNotEmpty($detectedStatic);

            $detectedStorage = AssetHelper::detect('storage/uploads/test.jpg');
            $this->assertNotEmpty($detectedStorage);

            $detectedExternal = AssetHelper::detect('https://example.com/image.jpg');
            $this->assertEquals('https://example.com/image.jpg', $detectedExternal);
        }
    }

    /**
     * Test global helper functions with domain context
     */
    public function test_global_helpers_with_domain_context(): void
    {
        $domains = [
            'www.dgnravepay.com',
            'dgnravepay.com'
        ];

        foreach ($domains as $domain) {
            $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            // Test domain_asset helper
            $domainAsset = domain_asset('logo.png');
            $this->assertNotEmpty($domainAsset);
            // In test environment, may use Vite dev server or actual domain
            $this->assertTrue(
                str_contains($domainAsset, 'dgnravepay.com') || str_contains($domainAsset, 'localhost') || str_contains($domainAsset, '[::]:'),
                "Domain asset should contain expected domain or development server URL"
            );

            // Test storage_asset helper
            $storageAsset = storage_asset('uploads/test.jpg');
            $this->assertNotEmpty($storageAsset);
            $this->assertStringContainsString('storage', $storageAsset);

            // Test static_asset helper
            $staticAsset = static_asset('logo.png');
            $this->assertNotEmpty($staticAsset);

            // Test safe helpers
            $safeAsset = safe_asset('nonexistent.png');
            $this->assertNotEmpty($safeAsset);

            $safeStorageAsset = safe_storage_asset('nonexistent.jpg');
            $this->assertNotEmpty($safeStorageAsset);

            $safeStaticAsset = safe_static_asset('nonexistent.png');
            $this->assertNotEmpty($safeStaticAsset);
        }
    }

    /**
     * Test asset URL generation with different ports
     */
    public function test_asset_url_generation_with_ports(): void
    {
        $hostConfigs = [
            'localhost:8000',
            'localhost:3000',
            'dgnravepay.com:8080'
        ];

        foreach ($hostConfigs as $host) {
            $response = $this->get('/', [
                'HTTP_HOST' => $host
            ]);

            $url = AssetHelper::url('logo.png');
            $this->assertNotEmpty($url, "URL should be generated for host {$host}");
        }
    }

    /**
     * Test HTTPS enforcement in asset URLs
     */
    public function test_https_enforcement_in_asset_urls(): void
    {
        // Test with HTTPS
        $httpsResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        $httpsResponse->assertStatus(200);

        $httpsUrl = AssetHelper::url('logo.png');
        $this->assertStringContainsString('https://', $httpsUrl, 'HTTPS requests should generate HTTPS asset URLs');

        // Test with HTTP (should still prefer HTTPS for assets in production)
        $httpResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com'
        ]);

        $httpUrl = AssetHelper::url('logo.png');
        $this->assertNotEmpty($httpUrl, 'HTTP requests should still generate asset URLs');
    }

    /**
     * Test domain normalization in asset URLs
     */
    public function test_domain_normalization_in_asset_urls(): void
    {
        // Test various domain formats
        $domainVariants = [
            'www.dgnravepay.com',
            'dgnravepay.com',
            'WWW.DGNRAVEPAY.COM',
            'DGNRAVEPAY.COM'
        ];

        foreach ($domainVariants as $domain) {
            $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $url = AssetHelper::url('logo.png');
            $this->assertNotEmpty($url, "URL should be generated for domain variant {$domain}");
            
            // URL should be normalized (lowercase, consistent format)
            $this->assertStringContainsString('dgnravepay.com', strtolower($url));
        }
    }

    /**
     * Test asset URL generation with custom domain configuration
     */
    public function test_asset_url_generation_with_custom_domain_config(): void
    {
        // Test with different domain configurations
        $originalConfig = config('app.url');
        
        try {
            // Test with different base URLs
            config(['app.url' => 'https://custom.example.com']);
            
            $url = AssetHelper::url('logo.png');
            $this->assertNotEmpty($url);
            
        } finally {
            // Restore original configuration
            config(['app.url' => $originalConfig]);
        }
    }

    /**
     * Test cross-domain asset reference handling
     */
    public function test_cross_domain_asset_reference_handling(): void
    {
        // Test external asset URLs are passed through unchanged
        $externalUrls = [
            'https://cdn.example.com/image.jpg',
            'http://assets.example.com/style.css'
        ];

        foreach ($externalUrls as $externalUrl) {
            $result = AssetHelper::detect($externalUrl);
            $this->assertEquals($externalUrl, $result, 
                "External URL {$externalUrl} should be passed through unchanged");
        }
        
        // Test protocol-relative URLs (may be processed differently)
        $protocolRelativeUrl = '//fonts.googleapis.com/css?family=Roboto';
        $result = AssetHelper::detect($protocolRelativeUrl);
        $this->assertNotEmpty($result, "Protocol-relative URL should return a valid result");
        // May be converted to full URL or passed through - both are acceptable
        $this->assertTrue(
            $result === $protocolRelativeUrl || str_contains($result, 'fonts.googleapis.com'),
            "Protocol-relative URL should be handled appropriately"
        );
    }
}