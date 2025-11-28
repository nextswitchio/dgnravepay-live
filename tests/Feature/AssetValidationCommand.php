<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\BlogPost;
use App\Models\CareerPost;

/**
 * Comprehensive asset validation that can be run to audit all pages
 * for asset URL consistency issues
 */
class AssetValidationCommand extends TestCase
{
    use RefreshDatabase;

    /**
     * Run comprehensive asset validation across all pages
     */
    public function test_comprehensive_asset_validation()
    {
        $this->artisan('migrate:fresh');
        
        $issues = [];
        
        // Test all main pages
        $pages = [
            '/' => 'Homepage',
            '/business' => 'Business page',
            '/about' => 'About page',
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
            $pageIssues = $this->validatePageAssets($url, $pageName);
            if (!empty($pageIssues)) {
                $issues[$pageName] = $pageIssues;
            }
        }

        // Test blog detail page
        $blogPost = BlogPost::factory()->create([
            'slug' => 'test-blog-post',
            'is_published' => true
        ]);
        $blogDetailIssues = $this->validatePageAssets('/blog/' . $blogPost->slug, 'Blog detail page');
        if (!empty($blogDetailIssues)) {
            $issues['Blog detail page'] = $blogDetailIssues;
        }

        // Test career detail page
        $careerPost = CareerPost::factory()->create([
            'slug' => 'test-career-post',
            'is_published' => true
        ]);
        $careerDetailIssues = $this->validatePageAssets('/career/' . $careerPost->slug, 'Career detail page');
        if (!empty($careerDetailIssues)) {
            $issues['Career detail page'] = $careerDetailIssues;
        }

        // Output results
        if (empty($issues)) {
            $this->addToAssertionCount(1);
            echo "\n✅ All pages passed asset URL consistency validation!\n";
        } else {
            echo "\n❌ Asset URL consistency issues found:\n\n";
            foreach ($issues as $pageName => $pageIssues) {
                echo "📄 {$pageName}:\n";
                foreach ($pageIssues as $issue) {
                    echo "  - {$issue}\n";
                }
                echo "\n";
            }
            $this->fail('Asset URL consistency issues found. See output above.');
        }
    }

    /**
     * Validate assets on a specific page
     */
    private function validatePageAssets(string $url, string $pageName): array
    {
        $issues = [];
        
        try {
            $response = $this->get($url);
            
            if ($response->status() !== 200) {
                return ["Page returned status {$response->status()}"];
            }
            
            $content = $response->getContent();
            
            // Check for incorrect /assets/ references
            if (str_contains($content, 'src="/assets/') || str_contains($content, "src='/assets/")) {
                $issues[] = "Contains incorrect /assets/ references";
            }
            
            // Extract and validate all image sources
            preg_match_all('/src=["\']([^"\']+)["\']/', $content, $matches);
            $imageSrcs = $matches[1] ?? [];
            
            foreach ($imageSrcs as $src) {
                // Skip external URLs and data URLs
                if (str_starts_with($src, 'http') || str_starts_with($src, 'data:') || str_starts_with($src, '//')) {
                    continue;
                }
                
                // Check static assets
                if (str_contains($src, 'resources/images/') || (str_contains($src, '/images/') && !str_contains($src, '/storage/'))) {
                    if (!str_starts_with($src, '/build/assets/') && !str_contains($src, config('app.url'))) {
                        $issues[] = "Static asset '{$src}' not using Vite build path";
                    }
                }
                
                // Check storage assets
                if (str_contains($src, 'storage/') && !str_starts_with($src, '/storage/') && !str_contains($src, config('app.url'))) {
                    $issues[] = "Storage asset '{$src}' not using proper storage URL";
                }
            }
            
            // Check CSS background images
            preg_match_all('/background-image:\s*url\(["\']?([^"\']+)["\']?\)/', $content, $bgMatches);
            $backgroundImages = $bgMatches[1] ?? [];
            
            foreach ($backgroundImages as $bgSrc) {
                if (str_starts_with($bgSrc, 'http') || str_starts_with($bgSrc, 'data:') || str_starts_with($bgSrc, '//')) {
                    continue;
                }
                
                if (str_contains($bgSrc, 'resources/images/') || str_contains($bgSrc, '/images/')) {
                    if (!str_starts_with($bgSrc, '/build/assets/') && !str_contains($bgSrc, config('app.url'))) {
                        $issues[] = "Background image '{$bgSrc}' not using Vite build path";
                    }
                }
            }
            
        } catch (\Exception $e) {
            $issues[] = "Error loading page: " . $e->getMessage();
        }
        
        return $issues;
    }

    /**
     * Test helper functions for consistency
     */
    public function test_helper_function_validation()
    {
        $issues = [];
        
        // Test static_asset helper
        try {
            $staticUrl = static_asset('images/logo.png');
            if (str_contains($staticUrl, '/assets/')) {
                $issues[] = "static_asset() generates incorrect /assets/ URL: {$staticUrl}";
            }
        } catch (\Exception $e) {
            $issues[] = "static_asset() error: " . $e->getMessage();
        }
        
        // Test domain_asset helper
        try {
            $domainUrl = domain_asset('images/logo.png');
            if (str_contains($domainUrl, '/assets/')) {
                $issues[] = "domain_asset() generates incorrect /assets/ URL: {$domainUrl}";
            }
        } catch (\Exception $e) {
            $issues[] = "domain_asset() error: " . $e->getMessage();
        }
        
        // Test storage_asset helper
        try {
            $storageUrl = storage_asset('uploads/test.jpg');
            if (!str_starts_with($storageUrl, '/storage/') && !str_contains($storageUrl, config('app.url'))) {
                $issues[] = "storage_asset() generates incorrect URL: {$storageUrl}";
            }
        } catch (\Exception $e) {
            $issues[] = "storage_asset() error: " . $e->getMessage();
        }
        
        if (empty($issues)) {
            $this->addToAssertionCount(1);
            echo "\n✅ All helper functions generate consistent URLs!\n";
        } else {
            echo "\n❌ Helper function issues found:\n";
            foreach ($issues as $issue) {
                echo "  - {$issue}\n";
            }
            $this->fail('Helper function consistency issues found.');
        }
    }
}