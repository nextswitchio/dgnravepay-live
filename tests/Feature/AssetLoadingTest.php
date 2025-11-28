<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Vite;

class AssetLoadingTest extends TestCase
{
    /**
     * Test asset loading on www domain format
     */
    public function test_assets_load_correctly_on_www_domain(): void
    {
        // Simulate www domain request
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check that the page contains Vite asset references (build/assets pattern)
        $response->assertSee('build/assets/');
        
        // Check that favicon is referenced correctly
        $response->assertSee('favicon');
        
        // Check that hero image is referenced correctly
        $response->assertSee('hero img 1');
        
        // Verify no broken asset URLs (should not contain localhost or incorrect domains)
        $content = $response->getContent();
        $this->assertStringNotContainsString('localhost', $content);
        $this->assertStringNotContainsString('127.0.0.1', $content);
        
        // Verify assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test asset loading on non-www domain format
     */
    public function test_assets_load_correctly_on_non_www_domain(): void
    {
        // Simulate non-www domain request
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check that the page contains Vite asset references (build/assets pattern)
        $response->assertSee('build/assets/');
        
        // Check that favicon is referenced correctly
        $response->assertSee('favicon');
        
        // Check that hero image is referenced correctly
        $response->assertSee('hero img 1');
        
        // Verify no broken asset URLs
        $content = $response->getContent();
        $this->assertStringNotContainsString('localhost', $content);
        $this->assertStringNotContainsString('127.0.0.1', $content);
        
        // Verify assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test CSS asset loading on www domain
     */
    public function test_css_assets_load_on_www_domain(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check for CSS asset references (Vite generates CSS in build/assets)
        $response->assertSee('build/assets/');
        
        // Check for external font loading
        $response->assertSee('fonts.bunny.net');
        
        // Verify CSS is properly linked
        $content = $response->getContent();
        $this->assertStringContainsString('rel="stylesheet"', $content);
        
        // Verify CSS assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test CSS asset loading on non-www domain
     */
    public function test_css_assets_load_on_non_www_domain(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check for CSS asset references (Vite generates CSS in build/assets)
        $response->assertSee('build/assets/');
        
        // Check for external font loading
        $response->assertSee('fonts.bunny.net');
        
        // Verify CSS is properly linked
        $content = $response->getContent();
        $this->assertStringContainsString('rel="stylesheet"', $content);
        
        // Verify CSS assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test JavaScript asset loading on www domain
     */
    public function test_javascript_assets_load_on_www_domain(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check for JavaScript asset references (Vite generates JS in build/assets)
        $response->assertSee('build/assets/');
        
        // Check for Alpine.js CDN
        $response->assertSee('alpinejs@3.x.x/dist/cdn.min.js');
        
        // Verify script tags are present
        $content = $response->getContent();
        $this->assertStringContainsString('<script', $content);
        
        // Verify JS assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test JavaScript asset loading on non-www domain
     */
    public function test_javascript_assets_load_on_non_www_domain(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check for JavaScript asset references (Vite generates JS in build/assets)
        $response->assertSee('build/assets/');
        
        // Check for Alpine.js CDN
        $response->assertSee('alpinejs@3.x.x/dist/cdn.min.js');
        
        // Verify script tags are present
        $content = $response->getContent();
        $this->assertStringContainsString('<script', $content);
        
        // Verify JS assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test image asset loading on www domain
     */
    public function test_image_assets_load_on_www_domain(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check for key image assets (Vite generates images in build/assets)
        $response->assertSee('favicon');
        $response->assertSee('hero img 1');
        $response->assertSee('vector line');
        $response->assertSee('account credited');
        
        // Verify images have proper alt attributes
        $content = $response->getContent();
        $this->assertStringContainsString('alt=', $content);
        
        // Verify image assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test image asset loading on non-www domain
     */
    public function test_image_assets_load_on_non_www_domain(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        
        // Check for key image assets (Vite generates images in build/assets)
        $response->assertSee('favicon');
        $response->assertSee('hero img 1');
        $response->assertSee('vector line');
        $response->assertSee('account credited');
        
        // Verify images have proper alt attributes
        $content = $response->getContent();
        $this->assertStringContainsString('alt=', $content);
        
        // Verify image assets are served with proper HTTPS URLs
        $this->assertStringContainsString('https://', $content);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
    }

    /**
     * Test asset URL generation consistency between domains
     */
    public function test_asset_url_generation_consistency(): void
    {
        // Test www domain
        $wwwResponse = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        // Test non-www domain
        $nonWwwResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $wwwResponse->assertStatus(200);
        $nonWwwResponse->assertStatus(200);

        // Both responses should contain asset references
        $wwwContent = $wwwResponse->getContent();
        $nonWwwContent = $nonWwwResponse->getContent();

        // Check that both contain build/assets paths
        $this->assertStringContainsString('build/assets/', $wwwContent);
        $this->assertStringContainsString('build/assets/', $nonWwwContent);
        
        // Verify both domains serve assets with HTTPS
        $this->assertStringContainsString('https://', $wwwContent);
        $this->assertStringContainsString('https://', $nonWwwContent);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $wwwContent);
        $this->assertStringContainsString('dgnravepay.com/build/assets/', $nonWwwContent);
    }

    /**
     * Test multiple pages for asset loading on www domain
     */
    public function test_multiple_pages_asset_loading_www_domain(): void
    {
        $pages = ['/', '/about', '/business', '/savings', '/contact'];

        foreach ($pages as $page) {
            $response = $this->get($page, [
                'HTTP_HOST' => 'www.dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            // Each page should have basic assets
            $response->assertSee('build/assets/');
            $response->assertSee('favicon');
            
            // Verify no broken asset URLs
            $content = $response->getContent();
            $this->assertStringNotContainsString('localhost', $content);
            
            // Verify assets are served with proper HTTPS URLs
            $this->assertStringContainsString('https://', $content);
            $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
        }
    }

    /**
     * Test multiple pages for asset loading on non-www domain
     */
    public function test_multiple_pages_asset_loading_non_www_domain(): void
    {
        $pages = ['/', '/about', '/business', '/savings', '/contact'];

        foreach ($pages as $page) {
            $response = $this->get($page, [
                'HTTP_HOST' => 'dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
            
            // Each page should have basic assets
            $response->assertSee('build/assets/');
            $response->assertSee('favicon');
            
            // Verify no broken asset URLs
            $content = $response->getContent();
            $this->assertStringNotContainsString('localhost', $content);
            
            // Verify assets are served with proper HTTPS URLs
            $this->assertStringContainsString('https://', $content);
            $this->assertStringContainsString('dgnravepay.com/build/assets/', $content);
        }
    }

    /**
     * Test CSRF token handling across domains
     */
    public function test_csrf_token_handling_across_domains(): void
    {
        // Test www domain
        $wwwResponse = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        // Test non-www domain
        $nonWwwResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $wwwResponse->assertStatus(200);
        $nonWwwResponse->assertStatus(200);

        // Both should have CSRF token meta tag
        $wwwResponse->assertSee('csrf-token');
        $nonWwwResponse->assertSee('csrf-token');

        // Extract CSRF tokens
        $wwwContent = $wwwResponse->getContent();
        $nonWwwContent = $nonWwwResponse->getContent();

        $this->assertStringContainsString('name="csrf-token"', $wwwContent);
        $this->assertStringContainsString('name="csrf-token"', $nonWwwContent);
    }
}