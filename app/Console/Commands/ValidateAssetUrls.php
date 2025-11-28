<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\BlogPost;
use App\Models\CareerPost;

class ValidateAssetUrls extends Command
{
    protected $signature = 'assets:validate {--url=http://localhost} {--check-external}';
    protected $description = 'Validate asset URL consistency across all pages';

    public function handle()
    {
        $baseUrl = $this->option('url');
        $checkExternal = $this->option('check-external');
        
        $this->info("Validating asset URLs for: {$baseUrl}");
        $this->newLine();
        
        $issues = [];
        
        // Define pages to check
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

        // Check each page
        foreach ($pages as $path => $pageName) {
            $this->info("Checking {$pageName}...");
            $pageIssues = $this->validatePage($baseUrl . $path, $pageName, $checkExternal);
            if (!empty($pageIssues)) {
                $issues[$pageName] = $pageIssues;
            }
        }

        // Check blog detail pages (sample)
        $blogPosts = BlogPost::where('is_published', true)->limit(3)->get();
        foreach ($blogPosts as $post) {
            $this->info("Checking blog post: {$post->title}");
            $pageIssues = $this->validatePage($baseUrl . '/blog/' . $post->slug, "Blog: {$post->title}", $checkExternal);
            if (!empty($pageIssues)) {
                $issues["Blog: {$post->title}"] = $pageIssues;
            }
        }

        // Check career detail pages (sample)
        $careerPosts = CareerPost::where('is_published', true)->limit(3)->get();
        foreach ($careerPosts as $post) {
            $this->info("Checking career post: {$post->title}");
            $pageIssues = $this->validatePage($baseUrl . '/career/' . $post->slug, "Career: {$post->title}", $checkExternal);
            if (!empty($pageIssues)) {
                $issues["Career: {$post->title}"] = $pageIssues;
            }
        }

        $this->newLine();

        // Report results
        if (empty($issues)) {
            $this->info('✅ All pages passed asset URL consistency validation!');
            return 0;
        } else {
            $this->error('❌ Asset URL consistency issues found:');
            $this->newLine();
            
            foreach ($issues as $pageName => $pageIssues) {
                $this->warn("📄 {$pageName}:");
                foreach ($pageIssues as $issue) {
                    $this->line("  - {$issue}");
                }
                $this->newLine();
            }
            
            return 1;
        }
    }

    private function validatePage(string $url, string $pageName, bool $checkExternal = false): array
    {
        $issues = [];
        
        try {
            $response = Http::timeout(10)->get($url);
            
            if (!$response->successful()) {
                return ["Page returned status {$response->status()}"];
            }
            
            $content = $response->body();
            
            // Check for incorrect /assets/ references
            if (str_contains($content, 'src="/assets/') || str_contains($content, "src='/assets/")) {
                $issues[] = "Contains incorrect /assets/ references";
            }
            
            // Extract and validate all image sources
            preg_match_all('/src=["\']([^"\']+)["\']/', $content, $matches);
            $imageSrcs = $matches[1] ?? [];
            
            foreach ($imageSrcs as $src) {
                // Skip data URLs
                if (str_starts_with($src, 'data:')) {
                    continue;
                }
                
                // Skip external URLs unless checking them
                if ((str_starts_with($src, 'http') || str_starts_with($src, '//')) && !$checkExternal) {
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
                
                // If checking external assets, verify they load
                if ($checkExternal && (str_starts_with($src, 'http') || str_starts_with($src, '//'))) {
                    $assetUrl = str_starts_with($src, '//') ? 'https:' . $src : $src;
                    try {
                        $assetResponse = Http::timeout(5)->head($assetUrl);
                        if (!$assetResponse->successful()) {
                            $issues[] = "External asset '{$src}' returns {$assetResponse->status()}";
                        }
                    } catch (\Exception $e) {
                        $issues[] = "External asset '{$src}' failed to load: " . $e->getMessage();
                    }
                }
            }
            
            // Check CSS background images
            preg_match_all('/background-image:\s*url\(["\']?([^"\']+)["\']?\)/', $content, $bgMatches);
            $backgroundImages = $bgMatches[1] ?? [];
            
            foreach ($backgroundImages as $bgSrc) {
                if (str_starts_with($bgSrc, 'data:')) {
                    continue;
                }
                
                if ((str_starts_with($bgSrc, 'http') || str_starts_with($bgSrc, '//')) && !$checkExternal) {
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
}