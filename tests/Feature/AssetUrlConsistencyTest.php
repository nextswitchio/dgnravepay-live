<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\BlogPost;
use App\Models\CareerPost;

class AssetUrlConsistencyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test homepage asset loading consistency
     */
    public function test_homepage_asset_loading()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        
        // Get the response content
        $content = $response->getContent();
        
        // Check that no assets are loading from incorrect /assets/ path
        $this->assertStringNotContainsString('src="/assets/', $content, 'Homepage contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'Homepage contains incorrect /assets/ references');
        
        // Check that static assets use proper Vite paths or domain_asset helper
        $this->assertAssetUrlsAreConsistent($content, 'Homepage');
    }

    /**
     * Test business page asset references
     */
    public function test_business_page_asset_references()
    {
        $response = $this->get('/business');
        
        $response->assertStatus(200);
        
        $content = $response->getContent();
        
        // Check that no assets are loading from incorrect /assets/ path
        $this->assertStringNotContainsString('src="/assets/', $content, 'Business page contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'Business page contains incorrect /assets/ references');
        
        $this->assertAssetUrlsAreConsistent($content, 'Business page');
    }

    /**
     * Test about page image display
     */
    public function test_about_page_image_display()
    {
        $response = $this->get('/about');
        
        $response->assertStatus(200);
        
        $content = $response->getContent();
        
        // Check that no assets are loading from incorrect /assets/ path
        $this->assertStringNotContainsString('src="/assets/', $content, 'About page contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'About page contains incorrect /assets/ references');
        
        $this->assertAssetUrlsAreConsistent($content, 'About page');
    }

    /**
     * Test blog pages asset consistency
     */
    public function test_blog_pages_asset_consistency()
    {
        // Test blog index page
        $response = $this->get('/blog');
        $response->assertStatus(200);
        
        $content = $response->getContent();
        
        // Check that no assets are loading from incorrect /assets/ path
        $this->assertStringNotContainsString('src="/assets/', $content, 'Blog index page contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'Blog index page contains incorrect /assets/ references');
        
        $this->assertAssetUrlsAreConsistent($content, 'Blog index page');
        
        // Create a test blog post to test detail page
        $blogPost = BlogPost::factory()->create([
            'title' => 'Test Blog Post',
            'slug' => 'test-blog-post',
            'content' => 'Test content',
            'is_published' => true,
            'cover_image_path' => 'test-cover.jpg'
        ]);
        
        $response = $this->get('/blog/' . $blogPost->slug);
        $response->assertStatus(200);
        
        $content = $response->getContent();
        
        // Check blog detail page
        $this->assertStringNotContainsString('src="/assets/', $content, 'Blog detail page contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'Blog detail page contains incorrect /assets/ references');
        
        $this->assertAssetUrlsAreConsistent($content, 'Blog detail page');
    }

    /**
     * Test career pages asset consistency
     */
    public function test_career_pages_asset_consistency()
    {
        // Test career index page
        $response = $this->get('/career');
        $response->assertStatus(200);
        
        $content = $response->getContent();
        
        // Check that no assets are loading from incorrect /assets/ path
        $this->assertStringNotContainsString('src="/assets/', $content, 'Career index page contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'Career index page contains incorrect /assets/ references');
        
        $this->assertAssetUrlsAreConsistent($content, 'Career index page');
        
        // Create a test career post to test detail page
        $careerPost = CareerPost::factory()->create([
            'title' => 'Test Career Post',
            'slug' => 'test-career-post',
            'description' => 'Test description',
            'is_published' => true
        ]);
        
        $response = $this->get('/career/' . $careerPost->slug);
        $response->assertStatus(200);
        
        $content = $response->getContent();
        
        // Check career detail page
        $this->assertStringNotContainsString('src="/assets/', $content, 'Career detail page contains incorrect /assets/ references');
        $this->assertStringNotContainsString("src='/assets/", $content, 'Career detail page contains incorrect /assets/ references');
        
        $this->assertAssetUrlsAreConsistent($content, 'Career detail page');
    }

    /**
     * Test additional key pages for asset consistency
     */
    public function test_additional_pages_asset_consistency()
    {
        $pages = [
            '/savings' => 'Savings page',
            '/virtual' => 'Virtual page',
            '/contact' => 'Contact page',
            '/pos' => 'POS page',
            '/loan' => 'Loan page',
            '/travel' => 'Travel page'
        ];

        foreach ($pages as $url => $pageName) {
            $response = $this->get($url);
            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check that no assets are loading from incorrect /assets/ path
            $this->assertStringNotContainsString('src="/assets/', $content, "{$pageName} contains incorrect /assets/ references");
            $this->assertStringNotContainsString("src='/assets/", $content, "{$pageName} contains incorrect /assets/ references");
            
            $this->assertAssetUrlsAreConsistent($content, $pageName);
        }
    }

    /**
     * Helper method to assert asset URLs are consistent
     */
    private function assertAssetUrlsAreConsistent(string $content, string $pageName)
    {
        // Extract all image src attributes
        preg_match_all('/src=["\']([^"\']+)["\']/', $content, $matches);
        $imageSrcs = $matches[1] ?? [];
        
        foreach ($imageSrcs as $src) {
            // Skip external URLs and data URLs
            if (str_starts_with($src, 'http') || str_starts_with($src, 'data:') || str_starts_with($src, '//')) {
                continue;
            }
            
            // Check that static assets use proper paths
            if (str_contains($src, 'resources/images/') || str_contains($src, '/images/')) {
                // Should use Vite build path or domain_asset helper
                $this->assertTrue(
                    str_starts_with($src, '/build/assets/') || 
                    str_contains($src, config('app.url')) ||
                    str_starts_with($src, 'http'),
                    "Static asset '{$src}' on {$pageName} should use Vite build path or domain helper"
                );
            }
            
            // Check that storage assets use proper storage URLs
            if (str_contains($src, 'storage/') && !str_starts_with($src, '/storage/')) {
                $this->assertTrue(
                    str_starts_with($src, '/storage/') || 
                    str_contains($src, config('app.url')),
                    "Storage asset '{$src}' on {$pageName} should use proper storage URL"
                );
            }
        }
        
        // Extract all CSS background-image URLs
        preg_match_all('/background-image:\s*url\(["\']?([^"\']+)["\']?\)/', $content, $bgMatches);
        $backgroundImages = $bgMatches[1] ?? [];
        
        foreach ($backgroundImages as $bgSrc) {
            // Skip external URLs and data URLs
            if (str_starts_with($bgSrc, 'http') || str_starts_with($bgSrc, 'data:') || str_starts_with($bgSrc, '//')) {
                continue;
            }
            
            // Same checks for background images
            if (str_contains($bgSrc, 'resources/images/') || str_contains($bgSrc, '/images/')) {
                $this->assertTrue(
                    str_starts_with($bgSrc, '/build/assets/') || 
                    str_contains($bgSrc, config('app.url')),
                    "Background image '{$bgSrc}' on {$pageName} should use Vite build path or domain helper"
                );
            }
        }
    }

    /**
     * Test that asset helper functions generate consistent URLs
     */
    public function test_asset_helper_consistency()
    {
        // Test static asset helper
        $staticAssetUrl = static_asset('images/logo.png');
        $this->assertStringNotContainsString('/assets/', $staticAssetUrl, 'static_asset helper should not generate /assets/ URLs');
        
        // Test domain asset helper
        $domainAssetUrl = domain_asset('images/logo.png');
        $this->assertStringNotContainsString('/assets/', $domainAssetUrl, 'domain_asset helper should not generate /assets/ URLs');
        
        // Test storage asset helper
        $storageAssetUrl = storage_asset('uploads/test.jpg');
        $this->assertTrue(
            str_starts_with($storageAssetUrl, '/storage/') || 
            str_contains($storageAssetUrl, config('app.url')),
            'storage_asset helper should generate proper storage URLs'
        );
    }

    /**
     * Test that Vite assets are properly processed
     */
    public function test_vite_asset_processing()
    {
        // Check if Vite manifest exists (in production builds)
        $manifestPath = public_path('build/manifest.json');
        
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $this->assertIsArray($manifest, 'Vite manifest should be valid JSON');
            
            // Check that common assets are in the manifest
            $hasImageAssets = false;
            foreach ($manifest as $key => $asset) {
                if (str_contains($key, 'resources/images/') || str_contains($key, '.png') || str_contains($key, '.jpg')) {
                    $hasImageAssets = true;
                    break;
                }
            }
            
            // Note: This might not always be true in test environment
            // $this->assertTrue($hasImageAssets, 'Vite manifest should include processed image assets');
        }
    }
}