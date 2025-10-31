<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicDomainTest extends TestCase
{
    /**
     * Test basic page access on www domain
     */
    public function test_www_domain_access(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        $response->assertSee('DgnRavePay', false);
    }

    /**
     * Test basic page access on non-www domain
     */
    public function test_non_www_domain_access(): void
    {
        $response = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);

        $response->assertStatus(200);
        $response->assertSee('DgnRavePay', false);
    }

    /**
     * Test navigation pages on www domain
     */
    public function test_navigation_pages_www(): void
    {
        $pages = ['/', '/about', '/contact', '/blog'];

        foreach ($pages as $page) {
            $response = $this->get($page, [
                'HTTP_HOST' => 'www.dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
        }
    }

    /**
     * Test navigation pages on non-www domain
     */
    public function test_navigation_pages_non_www(): void
    {
        $pages = ['/', '/about', '/contact', '/blog'];

        foreach ($pages as $page) {
            $response = $this->get($page, [
                'HTTP_HOST' => 'dgnravepay.com',
                'HTTPS' => 'on'
            ]);

            $response->assertStatus(200);
        }
    }
}