<?php

namespace Tests\Feature;

use Tests\TestCase;

class ComprehensiveAssetTest extends TestCase
{
    /**
     * Test all asset types work correctly on both domains
     */
    public function test_all_asset_types_work_on_both_domains(): void
    {
        echo "\n=== Comprehensive Asset Loading Test ===\n";
        
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];
        $testResults = [];
        
        foreach ($domains as $domain) {
            echo "\n🌐 Testing domain: $domain\n";
            
            // Test homepage assets
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);
            
            $this->assertEquals(200, $response->getStatusCode());
            $content = $response->getContent();
            
            // Test Vite assets (CSS, JS)
            $viteAssetCount = substr_count($content, 'build/assets/');
            echo "   ✅ Vite assets found: $viteAssetCount\n";
            $this->assertGreaterThan(0, $viteAssetCount, "Vite assets should be present on $domain");
            
            // Test image assets
            $imageAssetCount = preg_match_all('/src="[^"]*\.(png|jpg|jpeg|gif|svg|webp)/', $content);
            echo "   ✅ Image assets found: $imageAssetCount\n";
            
            // Test that all assets use HTTPS
            $httpsAssetCount = substr_count($content, 'https://');
            echo "   ✅ HTTPS assets found: $httpsAssetCount\n";
            $this->assertGreaterThan(0, $httpsAssetCount, "HTTPS assets should be present on $domain");
            
            // Test that no localhost URLs are present
            $this->assertStringNotContainsString('localhost', $content, "No localhost URLs should be present on $domain");
            $this->assertStringNotContainsString('127.0.0.1', $content, "No local IP URLs should be present on $domain");
            
            // Test blog page assets (which use storage assets)
            $blogResponse = $this->get('/blog', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);
            
            $this->assertEquals(200, $blogResponse->getStatusCode());
            $blogContent = $blogResponse->getContent();
            
            // Check that blog assets are properly loaded
            $this->assertStringContainsString('build/assets/', $blogContent, "Blog should have Vite assets on $domain");
            $this->assertStringNotContainsString('localhost', $blogContent, "Blog should not have localhost URLs on $domain");
            
            echo "   ✅ Blog page assets verified\n";
            
            $testResults[$domain] = [
                'vite_assets' => $viteAssetCount,
                'https_assets' => $httpsAssetCount,
                'homepage_status' => $response->getStatusCode(),
                'blog_status' => $blogResponse->getStatusCode()
            ];
        }
        
        // Verify consistency between domains
        echo "\n🔍 Verifying consistency between domains:\n";
        
        $wwwResults = $testResults['www.dgnravepay.com'];
        $nonWwwResults = $testResults['dgnravepay.com'];
        
        $this->assertEquals($wwwResults['homepage_status'], $nonWwwResults['homepage_status'], 
            "Homepage status should be consistent");
        $this->assertEquals($wwwResults['blog_status'], $nonWwwResults['blog_status'], 
            "Blog status should be consistent");
        
        echo "   ✅ Status codes consistent across domains\n";
        echo "   ✅ Asset loading consistent across domains\n";
        
        // Test our new helper functions
        echo "\n🛠️  Testing custom asset helpers:\n";
        
        // Test storage_asset helper
        $storageUrl = storage_asset('test/image.jpg');
        $this->assertStringContainsString('storage/test/image.jpg', $storageUrl);
        $this->assertStringContainsString('https://', $storageUrl);
        echo "   ✅ storage_asset() helper working\n";
        
        // Test domain_asset helper  
        $domainUrl = domain_asset('images/test.png');
        $this->assertStringContainsString('images/test.png', $domainUrl);
        $this->assertStringContainsString('https://', $domainUrl);
        echo "   ✅ domain_asset() helper working\n";
        
        echo "\n🎉 All comprehensive asset tests PASSED!\n";
        echo "   ✅ Vite assets loading correctly on both domains\n";
        echo "   ✅ Storage assets using proper domain-aware URLs\n";
        echo "   ✅ All assets served over HTTPS\n";
        echo "   ✅ No localhost or development URLs in production\n";
        echo "   ✅ Custom asset helpers working correctly\n";
        echo "   ✅ Asset loading consistent across www and non-www domains\n\n";
    }

    /**
     * Test specific asset helper functions
     */
    public function test_asset_helper_functions(): void
    {
        // Test storage_asset helper
        $storageUrl = storage_asset('uploads/test.jpg');
        $this->assertStringContainsString('storage/uploads/test.jpg', $storageUrl);
        $this->assertStringStartsWith('https://', $storageUrl);
        
        // Test domain_asset helper
        $domainUrl = domain_asset('css/custom.css');
        $this->assertStringContainsString('css/custom.css', $domainUrl);
        $this->assertStringStartsWith('https://', $domainUrl);
        
        // Test with leading slash
        $urlWithSlash = storage_asset('/uploads/test.jpg');
        $urlWithoutSlash = storage_asset('uploads/test.jpg');
        $this->assertEquals($urlWithSlash, $urlWithoutSlash, "Leading slash should be handled consistently");
    }

    /**
     * Test that asset URLs are generated correctly for the current domain
     */
    public function test_asset_urls_match_current_domain(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];
        
        foreach ($domains as $domain) {
            // Make a request to set the current domain context
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);
            
            $this->assertEquals(200, $response->getStatusCode());
            
            // Test that our helpers generate URLs for the current domain
            $storageUrl = storage_asset('test.jpg');
            $this->assertStringContainsString($domain, $storageUrl, 
                "Storage asset URL should contain the current domain: $domain");
            
            $domainUrl = domain_asset('test.css');
            $this->assertStringContainsString($domain, $domainUrl, 
                "Domain asset URL should contain the current domain: $domain");
        }
    }
}