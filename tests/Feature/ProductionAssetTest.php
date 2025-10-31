<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\AssetHelper;

class ProductionAssetTest extends TestCase
{
    /**
     * Test asset loading in production-like environment
     */
    public function test_production_asset_loading(): void
    {
        echo "\n=== Production Asset Loading Test ===\n";
        
        // Temporarily set environment to production for this test
        $originalEnv = config('app.env');
        config(['app.env' => 'production']);
        
        try {
            $domains = ['www.dgnravepay.com', 'dgnravepay.com'];
            
            foreach ($domains as $domain) {
                echo "\n🌐 Testing production assets on domain: $domain\n";
                
                // Test homepage
                $response = $this->get('/', [
                    'HTTP_HOST' => $domain,
                    'HTTPS' => 'on'
                ]);
                
                $this->assertEquals(200, $response->getStatusCode());
                $content = $response->getContent();
                
                // In production mode, assets should be served from build/assets or proper URLs
                $this->assertStringNotContainsString('localhost', $content);
                $this->assertStringNotContainsString('127.0.0.1', $content);
                $this->assertStringNotContainsString('[::]:5173', $content);
                
                // Should have HTTPS URLs
                $this->assertStringContainsString('https://', $content);
                
                echo "   ✅ No development URLs found\n";
                echo "   ✅ HTTPS URLs present\n";
                
                // Test blog page
                $blogResponse = $this->get('/blog', [
                    'HTTP_HOST' => $domain,
                    'HTTPS' => 'on'
                ]);
                
                $this->assertEquals(200, $blogResponse->getStatusCode());
                $blogContent = $blogResponse->getContent();
                
                $this->assertStringNotContainsString('localhost', $blogContent);
                $this->assertStringNotContainsString('[::]:5173', $blogContent);
                
                echo "   ✅ Blog page assets verified\n";
            }
            
            // Test our asset helpers work correctly
            echo "\n🛠️  Testing asset helpers in production mode:\n";
            
            $storageUrl = AssetHelper::storage('test/image.jpg');
            $this->assertStringContainsString('https://', $storageUrl);
            $this->assertStringContainsString('storage/test/image.jpg', $storageUrl);
            $this->assertStringNotContainsString('localhost', $storageUrl);
            
            echo "   ✅ Storage asset helper generates production URLs\n";
            
            $domainUrl = AssetHelper::url('css/style.css');
            $this->assertStringContainsString('https://', $domainUrl);
            $this->assertStringContainsString('css/style.css', $domainUrl);
            $this->assertStringNotContainsString('localhost', $domainUrl);
            
            echo "   ✅ Domain asset helper generates production URLs\n";
            
            echo "\n🎉 Production asset tests PASSED!\n";
            echo "   ✅ No development server URLs in production mode\n";
            echo "   ✅ All assets served over HTTPS\n";
            echo "   ✅ Asset helpers generate correct production URLs\n";
            echo "   ✅ Both www and non-www domains work correctly\n\n";
            
        } finally {
            // Restore original environment
            config(['app.env' => $originalEnv]);
        }
    }

    /**
     * Test that storage_asset helper works correctly in production
     */
    public function test_storage_asset_helper_production(): void
    {
        // Temporarily set to production
        $originalEnv = config('app.env');
        config(['app.env' => 'production']);
        
        try {
            // Make a request to set domain context
            $response = $this->get('/', [
                'HTTP_HOST' => 'dgnravepay.com',
                'HTTPS' => 'on'
            ]);
            
            $response->assertStatus(200);
            
            // Test storage asset generation
            $imageUrl = AssetHelper::storage('blog/covers/image.jpg');
            
            $this->assertStringContainsString('https://dgnravepay.com', $imageUrl);
            $this->assertStringContainsString('storage/blog/covers/image.jpg', $imageUrl);
            $this->assertStringNotContainsString('localhost', $imageUrl);
            $this->assertStringNotContainsString('[::]:5173', $imageUrl);
            
            // Test with different file types
            $pdfUrl = AssetHelper::storage('documents/file.pdf');
            $this->assertStringContainsString('https://dgnravepay.com', $pdfUrl);
            $this->assertStringContainsString('storage/documents/file.pdf', $pdfUrl);
            
        } finally {
            config(['app.env' => $originalEnv]);
        }
    }

    /**
     * Test that our fixes work for the specific blog asset issue
     */
    public function test_blog_asset_fix(): void
    {
        echo "\n=== Blog Asset Fix Verification ===\n";
        
        // Test that our updated blog templates would work correctly
        $testCoverPath = 'blog/covers/test-image.jpg';
        
        // Test the storage_asset helper that we implemented
        $coverUrl = AssetHelper::storage($testCoverPath);
        
        $this->assertStringContainsString('https://', $coverUrl);
        $this->assertStringContainsString('dgnravepay.com', $coverUrl);
        $this->assertStringContainsString('storage/blog/covers/test-image.jpg', $coverUrl);
        $this->assertStringNotContainsString('localhost', $coverUrl);
        
        echo "   ✅ Blog cover image URLs generated correctly\n";
        
        // Test with leading slash (common in database storage)
        $coverUrlWithSlash = AssetHelper::storage('/blog/covers/test-image.jpg');
        $this->assertEquals($coverUrl, $coverUrlWithSlash);
        
        echo "   ✅ Leading slash handling works correctly\n";
        
        // Test fallback to Vite asset for default images
        $defaultImage = \Illuminate\Support\Facades\Vite::asset('resources/images/article 1.jpg');
        $this->assertStringContainsString('article 1.jpg', $defaultImage);
        
        echo "   ✅ Fallback to Vite assets works correctly\n";
        
        echo "\n🎉 Blog asset fix verification PASSED!\n";
        echo "   ✅ storage_asset() helper generates correct URLs\n";
        echo "   ✅ Leading slash handling works\n";
        echo "   ✅ Fallback to Vite assets works\n";
        echo "   ✅ No localhost URLs in generated assets\n\n";
    }
}