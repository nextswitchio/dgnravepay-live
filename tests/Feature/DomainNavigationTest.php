<?php

namespace Tests\Feature;

use Tests\TestCase;

class DomainNavigationTest extends TestCase
{
    /**
     * Test page navigation on www domain
     */
    public function test_page_navigation_on_www_domain(): void
    {
        $pages = [
            '/' => 'Take Control of Your Money',
            '/about' => 'About',
            '/business' => 'Business',
            '/contact' => 'Contact'
        ];

        foreach ($pages as $path => $expectedContent) {
            $response = $this->get($path, [
                'HTTP_HOST' => 'www.dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            $response->assertSee($expectedContent, false);
        }
    }

    /**
     * Test page navigation on non-www domain
     */
    public function test_page_navigation_on_non_www_domain(): void
    {
        $pages = [
            '/' => 'Take Control of Your Money',
            '/about' => 'About', 
            '/business' => 'Business',
            '/contact' => 'Contact'
        ];

        foreach ($pages as $path => $expectedContent) {
            $response = $this->get($path, [
                'HTTP_HOST' => 'dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            $response->assertSee($expectedContent, false);
        }
    }

    /**
     * Test CSRF token generation on both domains
     */
    public function test_csrf_token_generation(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            $response->assertSee('csrf-token');
            
            // Extract CSRF token from response
            $content = $response->getContent();
            preg_match('/name="csrf-token" content="([^"]+)"/', $content, $matches);
            
            $this->assertNotEmpty($matches);
            $this->assertNotEmpty($matches[1]);
        }
    }

    /**
     * Test JavaScript functionality on both domains
     */
    public function test_javascript_functionality(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check for Alpine.js CDN
            $this->assertStringContainsString('alpinejs@3.x.x/dist/cdn.min.js', $content);
            
            // Check for custom JavaScript files
            $this->assertStringContainsString('build/assets/', $content);
            
            // Check for interactive elements
            $this->assertStringContainsString('<script', $content);
        }
    }

    /**
     * Test navigation links consistency
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
        $commonPaths = ['/about', '/contact', '/blog'];
        
        foreach ($commonPaths as $path) {
            $this->assertStringContainsString($path, $wwwContent);
            $this->assertStringContainsString($path, $nonWwwContent);
        }
    }

    /**
     * Test responsive design elements
     */
    public function test_responsive_design_elements(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check for responsive design elements
            $this->assertStringContainsString('viewport', $content);
            $this->assertStringContainsString('width=device-width', $content);
            
            // Check for responsive CSS classes
            $responsivePatterns = ['md:', 'lg:', 'sm:'];
            $hasResponsiveClasses = false;
            
            foreach ($responsivePatterns as $pattern) {
                if (strpos($content, $pattern) !== false) {
                    $hasResponsiveClasses = true;
                    break;
                }
            }
            
            $this->assertTrue($hasResponsiveClasses, "Domain $domain should have responsive design elements");
        }
    }

    /**
     * Test error handling across domains
     */
    public function test_error_handling_across_domains(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/non-existent-page', [
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
}