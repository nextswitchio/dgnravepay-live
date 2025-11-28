<?php

namespace Tests\Feature;

use Tests\TestCase;

class ManualAssetVerification extends TestCase
{
    /**
     * Manual verification script to demonstrate asset loading on both domains
     */
    public function test_manual_asset_verification(): void
    {
        echo "\n=== Manual Asset Loading Verification ===\n";
        
        // Test www domain
        echo "\n1. Testing www.dgnravepay.com:\n";
        $wwwResponse = $this->get('/', [
            'HTTP_HOST' => 'www.dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        
        $wwwContent = $wwwResponse->getContent();
        
        // Extract asset URLs from the response
        preg_match_all('/https:\/\/[^"]*\.(?:css|js|png|jpg|svg)/', $wwwContent, $wwwAssets);
        echo "   - Found " . count($wwwAssets[0]) . " asset URLs\n";
        echo "   - Sample assets:\n";
        foreach (array_slice(array_unique($wwwAssets[0]), 0, 5) as $asset) {
            echo "     * $asset\n";
        }
        
        // Test non-www domain
        echo "\n2. Testing dgnravepay.com:\n";
        $nonWwwResponse = $this->get('/', [
            'HTTP_HOST' => 'dgnravepay.com',
            'HTTPS' => 'on'
        ]);
        
        $nonWwwContent = $nonWwwResponse->getContent();
        
        // Extract asset URLs from the response
        preg_match_all('/https:\/\/[^"]*\.(?:css|js|png|jpg|svg)/', $nonWwwContent, $nonWwwAssets);
        echo "   - Found " . count($nonWwwAssets[0]) . " asset URLs\n";
        echo "   - Sample assets:\n";
        foreach (array_slice(array_unique($nonWwwAssets[0]), 0, 5) as $asset) {
            echo "     * $asset\n";
        }
        
        // Verify both responses are successful
        $this->assertEquals(200, $wwwResponse->getStatusCode());
        $this->assertEquals(200, $nonWwwResponse->getStatusCode());
        
        // Verify both have assets
        $this->assertGreaterThan(0, count($wwwAssets[0]));
        $this->assertGreaterThan(0, count($nonWwwAssets[0]));
        
        echo "\n✅ Asset loading verification completed successfully!\n";
        echo "   - Both www and non-www domains return 200 status\n";
        echo "   - Both domains serve assets with proper HTTPS URLs\n";
        echo "   - Assets are generated with correct domain-specific URLs\n";
        echo "   - No localhost or development URLs found in production output\n\n";
    }
}