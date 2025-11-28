<?php

namespace Tests\Feature;

use Tests\TestCase;

class DomainConsistencyTest extends TestCase
{
    /**
     * Test navigation links consistency between domains
     */
    public function test_navigation_links_consistency(): void
    {
        $wwwResponse = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $nonWwwResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $wwwResponse->assertStatus(200);
        $nonWwwResponse->assertStatus(200);

        $wwwContent = $wwwResponse->getContent();
        $nonWwwContent = $nonWwwResponse->getContent();

        // Both should have navigation elements
        $this->assertStringContainsString('href=', $wwwContent);
        $this->assertStringContainsString('href=', $nonWwwContent);
        
        // Both should have common navigation paths
        $commonPaths = ['/about', '/contact', '/blog', '/business'];
        
        foreach ($commonPaths as $path) {
            $this->assertStringContainsString($path, $wwwContent, "Path $path should exist in www domain navigation");
            $this->assertStringContainsString($path, $nonWwwContent, "Path $path should exist in non-www domain navigation");
        }
    }

    /**
     * Test SEO elements consistency across domains
     */
    public function test_seo_elements_consistency(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check for essential SEO elements
            $this->assertStringContainsString('<title>', $content);
            $this->assertStringContainsString('meta name="description"', $content);
            $this->assertStringContainsString('meta charset=', $content);
            
            // Check for favicon
            $this->assertStringContainsString('favicon', $content);
        }
    }

    /**
     * Test error handling across domains
     */
    public function test_error_handling_across_domains(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            // Test 404 error handling
            $response = $this->get('/non-existent-page-12345', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $this->assertEquals(404, $response->getStatusCode());
            
            $content = $response->getContent();
            
            // Should not contain localhost or broken asset URLs
            $this->assertStringNotContainsString('localhost', $content);
            $this->assertStringNotContainsString('127.0.0.1', $content);
        }
    }

    /**
     * Test content consistency between domains
     */
    public function test_content_consistency_between_domains(): void
    {
        $pages = ['/', '/about', '/business', '/contact'];

        foreach ($pages as $page) {
            $wwwResponse = $this->get($page, [
                'HTTP_HOST' => 'www.dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $nonWwwResponse = $this->get($page, [
                'HTTP_HOST' => 'dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $wwwResponse->assertStatus(200);
            $nonWwwResponse->assertStatus(200);

            $wwwContent = $wwwResponse->getContent();
            $nonWwwContent = $nonWwwResponse->getContent();

            // Both should have similar content structure
            $this->assertStringContainsString('DgnRavePay', $wwwContent);
            $this->assertStringContainsString('DgnRavePay', $nonWwwContent);

            // Both should have proper HTML structure
            $this->assertStringContainsString('<!DOCTYPE html', $wwwContent);
            $this->assertStringContainsString('<!DOCTYPE html', $nonWwwContent);
            
            $this->assertStringContainsString('</html>', $wwwContent);
            $this->assertStringContainsString('</html>', $nonWwwContent);
        }
    }

    /**
     * Test asset loading consistency between domains
     */
    public function test_asset_loading_consistency(): void
    {
        $wwwResponse = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $nonWwwResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $wwwResponse->assertStatus(200);
        $nonWwwResponse->assertStatus(200);

        $wwwContent = $wwwResponse->getContent();
        $nonWwwContent = $nonWwwResponse->getContent();

        // Both should load assets from build/assets
        $this->assertStringContainsString('build/assets/', $wwwContent);
        $this->assertStringContainsString('build/assets/', $nonWwwContent);

        // Both should have HTTPS asset URLs
        $this->assertStringContainsString('https://', $wwwContent);
        $this->assertStringContainsString('https://', $nonWwwContent);

        // Both should reference the same domain for assets
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $wwwContent);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $nonWwwContent);
    }

    /**
     * Test multiple page types work on both domains
     */
    public function test_multiple_page_types_both_domains(): void
    {
        $pageTypes = [
            '/' => 'homepage',
            '/about' => 'static page',
            '/blog' => 'blog listing',
            '/career' => 'career listing'
        ];

        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            foreach ($pageTypes as $path => $pageType) {
                $response = $this->get($path, [
                    'HTTP_HOST' => $domain,
                    'HTTPS' => 'on'
                ]);

                $response->assertStatus(200, "Page $path ($pageType) should load on domain $domain");
                
                $content = $response->getContent();
                
                // Each page should have basic HTML structure
                $this->assertStringContainsString('<!DOCTYPE html', $content);
                $this->assertStringContainsString('<head>', $content);
                $this->assertStringContainsString('<body', $content);
                $this->assertStringContainsString('</html>', $content);
                
                // Each page should have assets
                $this->assertStringContainsString('build/assets/', $content);
            }
        }
    }

    /**
     * Test session and cookie handling across domains
     */
    public function test_session_cookie_handling(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            // Check that CSRF token is properly generated (indicates session is working)
            $content = $response->getContent();
            $this->assertStringContainsString('csrf-token', $content);
            
            // Extract CSRF token to verify it's valid
            preg_match('/name="csrf-token" content="([^"]+)"/', $content, $matches);
            $this->assertNotEmpty($matches, "CSRF token should be present on domain: $domain");
            $this->assertGreaterThan(10, strlen($matches[1]), "CSRF token should be sufficiently long on domain: $domain");
        }
    }
}