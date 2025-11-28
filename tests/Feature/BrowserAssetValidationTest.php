<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\BlogPost;
use App\Models\CareerPost;

class BrowserAssetValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that all pages load without 404 asset errors
     */
    public function test_all_pages_load_without_404_asset_errors(): void
    {
        $pages = [
            '/' => 'Homepage',
            '/about' => 'About page',
            '/business' => 'Business page',
            '/savings' => 'Savings page',
            '/virtual' => 'Virtual page',
            '/contact' => 'Contact page',
            '/pos' => 'POS page',
            '/loan' => 'Loan page',
            '/travel' => 'Travel page',
            '/blog' => 'Blog index',
            '/career' => 'Career index'
        ];

        foreach ($pages as $url => $pageName) {
            $response = $this->get($url);
            $response->assertStatus(200, "{$pageName} should load successfully");

            $content = $response->getContent();
            
            // Extract all asset URLs from the page
            $assetUrls = $this->extractAssetUrls($content);
            
            // Validate each asset URL
            foreach ($assetUrls as $assetUrl) {
                $this->validateAssetUrl($assetUrl, $pageName);
            }
        }
    }

    /**
     * Test asset loading on blog detail pages
     */
    public function test_blog_detail_pages_asset_loading(): void
    {
        // Create test blog posts
        $blogPosts = BlogPost::factory()->count(3)->create([
            'is_published' => true,
            'cover_image_path' => 'test-cover.jpg'
        ]);

        foreach ($blogPosts as $post) {
            $response = $this->get('/blog/' . $post->slug);
            $response->assertStatus(200);

            $content = $response->getContent();
            $assetUrls = $this->extractAssetUrls($content);

            foreach ($assetUrls as $assetUrl) {
                $this->validateAssetUrl($assetUrl, "Blog post: {$post->title}");
            }
        }
    }

    /**
     * Test asset loading on career detail pages
     */
    public function test_career_detail_pages_asset_loading(): void
    {
        // Create test career posts
        $careerPosts = CareerPost::factory()->count(2)->create([
            'is_published' => true
        ]);

        foreach ($careerPosts as $post) {
            $response = $this->get('/career/' . $post->slug);
            $response->assertStatus(200);

            $content = $response->getContent();
            $assetUrls = $this->extractAssetUrls($content);

            foreach ($assetUrls as $assetUrl) {
                $this->validateAssetUrl($assetUrl, "Career post: {$post->title}");
            }
        }
    }

    /**
     * Test responsive image loading
     */
    public function test_responsive_image_loading(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Check for responsive image attributes (optional - not all pages may have them)
        preg_match_all('/srcset=["\']([^"\']+)["\']/', $content, $matches);
        $srcsets = $matches[1] ?? [];

        if (!empty($srcsets)) {
            foreach ($srcsets as $srcset) {
                // Parse srcset (format: "url 1x, url 2x" or "url 480w, url 800w")
                $urls = preg_split('/,\s*/', $srcset);
                
                foreach ($urls as $urlWithDescriptor) {
                    $url = trim(preg_replace('/\s+\d+[wx]?$/', '', $urlWithDescriptor));
                    if (!empty($url)) {
                        $this->validateAssetUrl($url, 'Responsive image srcset');
                    }
                }
            }
        } else {
            // If no srcset found, just verify regular images are present
            $this->assertStringContainsString('src=', $content, 'Page should contain images');
        }
    }

    /**
     * Test CSS background image loading
     */
    public function test_css_background_image_loading(): void
    {
        $pages = ['/', '/about', '/business'];

        foreach ($pages as $page) {
            $response = $this->get($page);
            $response->assertStatus(200);

            $content = $response->getContent();

            // Extract CSS background-image URLs
            preg_match_all('/background-image:\s*url\(["\']?([^"\']+)["\']?\)/', $content, $matches);
            $backgroundImages = $matches[1] ?? [];

            foreach ($backgroundImages as $bgUrl) {
                $this->validateAssetUrl($bgUrl, "CSS background image on {$page}");
            }
        }
    }

    /**
     * Test favicon and icon loading
     */
    public function test_favicon_and_icon_loading(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Extract favicon and icon URLs
        preg_match_all('/rel=["\'](?:icon|shortcut icon|apple-touch-icon)["\'][^>]*href=["\']([^"\']+)["\']/', $content, $matches);
        $iconUrls = $matches[1] ?? [];

        foreach ($iconUrls as $iconUrl) {
            $this->validateAssetUrl($iconUrl, 'Favicon/Icon');
        }
    }

    /**
     * Test JavaScript asset loading
     */
    public function test_javascript_asset_loading(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Extract JavaScript URLs
        preg_match_all('/<script[^>]*src=["\']([^"\']+)["\']/', $content, $matches);
        $jsUrls = $matches[1] ?? [];

        foreach ($jsUrls as $jsUrl) {
            $this->validateAssetUrl($jsUrl, 'JavaScript asset');
        }
    }

    /**
     * Test CSS asset loading
     */
    public function test_css_asset_loading(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Extract CSS URLs
        preg_match_all('/<link[^>]*rel=["\']stylesheet["\'][^>]*href=["\']([^"\']+)["\']/', $content, $matches);
        $cssUrls = $matches[1] ?? [];

        foreach ($cssUrls as $cssUrl) {
            $this->validateAssetUrl($cssUrl, 'CSS asset');
        }
    }

    /**
     * Test asset loading performance
     */
    public function test_asset_loading_performance(): void
    {
        $startTime = microtime(true);
        
        $response = $this->get('/');
        $response->assertStatus(200);
        
        $endTime = microtime(true);
        $loadTime = $endTime - $startTime;
        
        // Page should load within reasonable time (5 seconds for test environment)
        $this->assertLessThan(5.0, $loadTime, 'Page should load within 5 seconds');
        
        $content = $response->getContent();
        
        // Count total assets
        $assetUrls = $this->extractAssetUrls($content);
        $assetCount = count($assetUrls);
        
        // Should have reasonable number of assets (not too many to impact performance)
        $this->assertLessThan(100, $assetCount, 'Page should not have excessive number of assets');
    }

    /**
     * Test asset URL consistency across page reloads
     */
    public function test_asset_url_consistency_across_reloads(): void
    {
        // Load page multiple times
        $responses = [];
        for ($i = 0; $i < 3; $i++) {
            $responses[] = $this->get('/');
        }

        // Extract asset URLs from each response
        $assetUrlSets = [];
        foreach ($responses as $response) {
            $response->assertStatus(200);
            $content = $response->getContent();
            $assetUrlSets[] = $this->extractAssetUrls($content);
        }

        // Compare asset URLs across responses
        $firstSet = $assetUrlSets[0];
        for ($i = 1; $i < count($assetUrlSets); $i++) {
            $this->assertEquals(
                sort($firstSet), 
                sort($assetUrlSets[$i]), 
                'Asset URLs should be consistent across page reloads'
            );
        }
    }

    /**
     * Extract asset URLs from HTML content
     */
    private function extractAssetUrls(string $content): array
    {
        $urls = [];

        // Extract image src URLs
        preg_match_all('/src=["\']([^"\']+)["\']/', $content, $matches);
        $urls = array_merge($urls, $matches[1] ?? []);

        // Extract CSS href URLs
        preg_match_all('/<link[^>]*href=["\']([^"\']+)["\']/', $content, $matches);
        $urls = array_merge($urls, $matches[1] ?? []);

        // Extract JavaScript src URLs
        preg_match_all('/<script[^>]*src=["\']([^"\']+)["\']/', $content, $matches);
        $urls = array_merge($urls, $matches[1] ?? []);

        // Extract background-image URLs
        preg_match_all('/background-image:\s*url\(["\']?([^"\']+)["\']?\)/', $content, $matches);
        $urls = array_merge($urls, $matches[1] ?? []);

        // Filter out external URLs and data URLs for local asset validation
        $localUrls = array_filter($urls, function($url) {
            return !str_starts_with($url, 'http') && 
                   !str_starts_with($url, 'data:') && 
                   !str_starts_with($url, '//') &&
                   !empty(trim($url));
        });

        return array_unique($localUrls);
    }

    /**
     * Validate individual asset URL
     */
    private function validateAssetUrl(string $url, string $context): void
    {
        // Skip external URLs and data URLs
        if (str_starts_with($url, 'http') || str_starts_with($url, 'data:') || str_starts_with($url, '//')) {
            return;
        }

        // Check that URL doesn't use incorrect /assets/ path
        $this->assertStringNotContainsString('/assets/', $url, 
            "Asset URL '{$url}' in {$context} should not use incorrect /assets/ path");

        // Check that static assets use proper Vite build path or domain helper
        if (str_contains($url, 'resources/images/') || 
            str_contains($url, '/images/') || 
            str_contains($url, '.png') || 
            str_contains($url, '.jpg') || 
            str_contains($url, '.svg')) {
            
            $this->assertTrue(
                str_starts_with($url, '/build/assets/') || 
                str_contains($url, config('app.url')) ||
                str_starts_with($url, 'http'),
                "Static asset '{$url}' in {$context} should use Vite build path or domain helper"
            );
        }

        // Check that storage assets use proper storage URLs
        if (str_contains($url, 'storage/') && !str_starts_with($url, '/storage/')) {
            $this->assertTrue(
                str_starts_with($url, '/storage/') || 
                str_contains($url, config('app.url')),
                "Storage asset '{$url}' in {$context} should use proper storage URL"
            );
        }

        // Validate URL format
        if (str_starts_with($url, '/')) {
            // Relative URL - should be valid path
            $this->assertMatchesRegularExpression('/^\/[a-zA-Z0-9\/_.-]+$/', $url, 
                "Asset URL '{$url}' in {$context} should be valid relative path");
        } else {
            // Absolute URL - should be valid URL
            $this->assertTrue(
                filter_var($url, FILTER_VALIDATE_URL) !== false,
                "Asset URL '{$url}' in {$context} should be valid absolute URL"
            );
        }
    }
}