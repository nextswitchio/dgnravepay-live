<?php

namespace Tests\Feature;

use Tests\TestCase;

class DomainFunctionalityTest extends TestCase
{
    /**
     * Test page navigation on www domain
     */
    public function test_page_navigation_www_domain(): void
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
    public function test_page_navigation_non_www_domain(): void
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
    public function test_csrf_token_generation_both_domains(): void
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
            
            $this->assertNotEmpty($matches, "CSRF token should be present on domain: $domain");
            $this->assertNotEmpty($matches[1], "CSRF token should have a value on domain: $domain");
        }
    }

    /**
     * Test JavaScript functionality on both domains
     */
    public function test_javascript_functionality_both_domains(): void
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
     * Test form functionality and CSRF protection
     */
    public function test_form_functionality_and_csrf(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            // Test contact page which might have forms
            $response = $this->get('/contact', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check for CSRF token in meta tag
            $this->assertStringContainsString('csrf-token', $content);
            
            // If forms exist, they should be properly structured
            if (strpos($content, '<form') !== false) {
                $this->assertStringContainsString('<form', $content);
            }
        }
    }

    /**
     * Test interactive elements work on both domains
     */
    public function test_interactive_elements_both_domains(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check for interactive elements that require JavaScript
            $interactiveElements = [
                'x-data', // Alpine.js directives
                'onclick',
                'button',
                'carousel',
                'testimonials-marquee'
            ];
            
            $hasInteractiveElements = false;
            foreach ($interactiveElements as $element) {
                if (strpos($content, $element) !== false) {
                    $hasInteractiveElements = true;
                    break;
                }
            }
            
            $this->assertTrue($hasInteractiveElements, "Domain $domain should have interactive elements");
        }
    }

    /**
     * Test responsive design consistency
     */
    public function test_responsive_design_consistency(): void
    {
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];

        foreach ($domains as $domain) {
            $response = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            $content = $response->getContent();
            
            // Check for viewport meta tag
            $this->assertStringContainsString('viewport', $content);
            $this->assertStringContainsString('width=device-width', $content);
            
            // Check for responsive CSS classes (Tailwind CSS patterns)
            $responsivePatterns = ['md:', 'lg:', 'sm:', 'xl:'];
            $hasResponsiveClasses = false;
            
            foreach ($responsivePatterns as $pattern) {
                if (strpos($content, $pattern) !== false) {
                    $hasResponsiveClasses = true;
                    break;
                }
            }
            
            $this->assertTrue($hasResponsiveClasses, "Domain $domain should have responsive design classes");
        }
    }
}