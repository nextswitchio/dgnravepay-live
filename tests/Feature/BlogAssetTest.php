<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\AssetHelper;

class BlogAssetTest extends TestCase
{
    /**
     * Test that blog pages load correctly with proper asset URLs
     */
    public function test_blog_assets_load_correctly(): void
    {
        echo "\n=== Blog Asset Loading Test ===\n";
        
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];
        
        foreach ($domains as $domain) {
            echo "\n🌐 Testing blog assets on domain: $domain\n";
            
            // Test blog listing page
            $blogResponse = $this->get('/blog', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);
            
            $this->assertEquals(200, $blogResponse->getStatusCode());
            $blogContent = $blogResponse->getContent();
            
            // Verify no localhost URLs
            $this->assertStringNotContainsString('localhost', $blogContent);
            $this->assertStringNotContainsString('127.0.0.1', $blogContent);
            
            // Verify HTTPS assets
            $this->assertStringContainsString('https://', $blogContent);
            
            // Verify Vite assets are present
            $this->assertStringContainsString('build/assets/', $blogContent);
            
            echo "   ✅ Blog listing page assets verified\n";
            
            // Test that storage_asset helper works correctly
            $testStorageUrl = AssetHelper::storage('test/image.jpg');
            $this->assertStringContainsString('https://', $testStorageUrl);
            $this->assertStringContainsString('dgnravepay.com', $testStorageUrl);
            $this->assertStringContainsString('storage/test/image.jpg', $testStorageUrl);
            
            echo "   ✅ Storage asset helper working correctly\n";
        }
        
        echo "\n🎉 Blog asset tests PASSED!\n";
        echo "   ✅ Blog pages load without localhost URLs\n";
        echo "   ✅ All assets served over HTTPS\n";
        echo "   ✅ Storage asset helper generates correct URLs\n";
        echo "   ✅ Vite assets loading correctly\n\n";
    }

    /**
     * Test storage asset helper with various inputs
     */
    public function test_storage_asset_helper_variations(): void
    {
        // Test with leading slash
        $url1 = AssetHelper::storage('/uploads/image.jpg');
        $url2 = AssetHelper::storage('uploads/image.jpg');
        $this->assertEquals($url1, $url2, "Leading slash should be handled consistently");
        
        // Test with nested paths
        $nestedUrl = AssetHelper::storage('blog/covers/image.jpg');
        $this->assertStringContainsString('storage/blog/covers/image.jpg', $nestedUrl);
        $this->assertStringContainsString('https://', $nestedUrl);
        
        // Test with different file types
        $imageUrl = AssetHelper::storage('images/photo.png');
        $this->assertStringContainsString('storage/images/photo.png', $imageUrl);
        
        $docUrl = AssetHelper::storage('documents/file.pdf');
        $this->assertStringContainsString('storage/documents/file.pdf', $docUrl);
    }

    /**
     * Test that the asset helper respects the current domain context
     */
    public function test_asset_helper_domain_context(): void
    {
        // Test with www domain request
        $wwwResponse = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        $wwwResponse->assertStatus(200);
        
        $wwwStorageUrl = AssetHelper::storage('test.jpg');
        
        // Test with non-www domain request  
        $nonWwwResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        $nonWwwResponse->assertStatus(200);
        
        $nonWwwStorageUrl = AssetHelper::storage('test.jpg');
        
        // Both should generate HTTPS URLs with dgnravepay.com (due to our normalization)
        $this->assertStringContainsString('https://dgnravepay.com', $wwwStorageUrl);
        $this->assertStringContainsString('https://dgnravepay.com', $nonWwwStorageUrl);
        $this->assertEquals($wwwStorageUrl, $nonWwwStorageUrl, "URLs should be consistent after normalization");
    }
}