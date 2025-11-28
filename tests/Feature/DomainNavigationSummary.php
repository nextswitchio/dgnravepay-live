<?php

namespace Tests\Feature;

use Tests\TestCase;

class DomainNavigationSummary extends TestCase
{
    /**
     * Comprehensive test demonstrating navigation and functionality work across both domains
     */
    public function test_comprehensive_domain_navigation_functionality(): void
    {
        echo "\n=== Domain Navigation and Functionality Test Summary ===\n";
        
        $domains = ['www.dgnravepay.com', 'dgnravepay.com'];
        $testPages = ['/', '/about', '/business', '/contact', '/blog'];
        
        $totalTests = 0;
        $passedTests = 0;
        
        foreach ($domains as $domain) {
            echo "\n🌐 Testing domain: $domain\n";
            
            foreach ($testPages as $page) {
                $totalTests++;
                
                $response = $this->get($page, [
                    'HTTP_HOST' => $domain,
                    'HTTPS' => 'on'
                ]);
                
                if ($response->getStatusCode() === 200) {
                    $passedTests++;
                    echo "   ✅ $page - OK\n";
                } else {
                    echo "   ❌ $page - Failed (Status: {$response->getStatusCode()})\n";
                }
                
                $this->assertEquals(200, $response->getStatusCode(), "Page $page should load on $domain");
            }
            
            // Test specific functionality for each domain
            echo "   🔧 Testing functionality:\n";
            
            $homeResponse = $this->get('/', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);
            
            $content = $homeResponse->getContent();
            
            // Test CSRF tokens
            if (strpos($content, 'csrf-token') !== false) {
                echo "      ✅ CSRF tokens - Present\n";
                $totalTests++;
                $passedTests++;
            } else {
                echo "      ❌ CSRF tokens - Missing\n";
                $totalTests++;
            }
            
            // Test JavaScript loading
            if (strpos($content, 'alpinejs') !== false && strpos($content, 'build/assets/') !== false) {
                echo "      ✅ JavaScript assets - Loading\n";
                $totalTests++;
                $passedTests++;
            } else {
                echo "      ❌ JavaScript assets - Issues detected\n";
                $totalTests++;
            }
            
            // Test CSS loading
            if (strpos($content, 'build/assets/') !== false && strpos($content, '.css') !== false) {
                echo "      ✅ CSS assets - Loading\n";
                $totalTests++;
                $passedTests++;
            } else {
                echo "      ❌ CSS assets - Issues detected\n";
                $totalTests++;
            }
            
            // Test responsive design
            if (strpos($content, 'viewport') !== false && strpos($content, 'width=device-width') !== false) {
                echo "      ✅ Responsive design - Configured\n";
                $totalTests++;
                $passedTests++;
            } else {
                echo "      ❌ Responsive design - Missing viewport\n";
                $totalTests++;
            }
            
            // Test interactive elements
            if (strpos($content, 'x-data') !== false || strpos($content, 'carousel') !== false) {
                echo "      ✅ Interactive elements - Present\n";
                $totalTests++;
                $passedTests++;
            } else {
                echo "      ❌ Interactive elements - Missing\n";
                $totalTests++;
            }
        }
        
        // Test error handling
        echo "\n🚨 Testing error handling:\n";
        foreach ($domains as $domain) {
            $totalTests++;
            $errorResponse = $this->get('/non-existent-page-test', [
                'HTTP_HOST' => $domain,
                'HTTPS' => 'on'
            ]);
            
            if ($errorResponse->getStatusCode() === 404) {
                echo "   ✅ 404 handling on $domain - Working\n";
                $passedTests++;
            } else {
                echo "   ❌ 404 handling on $domain - Unexpected status: {$errorResponse->getStatusCode()}\n";
            }
        }
        
        // Test asset consistency
        echo "\n🎨 Testing asset consistency:\n";
        $wwwResponse = $this->get('/', ['HTTP_HOST' => 'www.dgnravepay.com', 'HTTPS' => 'on']);
        $nonWwwResponse = $this->get('/', ['HTTP_HOST' => 'dgnravepay.com', 'HTTPS' => 'on']);
        
        $wwwContent = $wwwResponse->getContent();
        $nonWwwContent = $nonWwwResponse->getContent();
        
        $totalTests++;
        if (strpos($wwwContent, 'dgnravepay.com/build/assets/') !== false && 
            strpos($nonWwwContent, 'dgnravepay.com/build/assets/') !== false) {
            echo "   ✅ Asset URLs consistent across domains\n";
            $passedTests++;
        } else {
            echo "   ❌ Asset URL inconsistency detected\n";
        }
        
        // Final summary
        echo "\n📊 Test Results Summary:\n";
        echo "   Total tests: $totalTests\n";
        echo "   Passed: $passedTests\n";
        echo "   Failed: " . ($totalTests - $passedTests) . "\n";
        echo "   Success rate: " . round(($passedTests / $totalTests) * 100, 1) . "%\n";
        
        if ($passedTests === $totalTests) {
            echo "\n🎉 All navigation and functionality tests PASSED!\n";
            echo "   ✅ Both www and non-www domains are working correctly\n";
            echo "   ✅ All pages load successfully\n";
            echo "   ✅ CSRF tokens are generated properly\n";
            echo "   ✅ JavaScript and CSS assets load correctly\n";
            echo "   ✅ Interactive elements are functional\n";
            echo "   ✅ Error handling works as expected\n";
            echo "   ✅ Asset loading is consistent across domains\n\n";
        } else {
            echo "\n⚠️  Some tests failed. Please review the issues above.\n\n";
        }
        
        // Assert that all tests passed
        $this->assertEquals($totalTests, $passedTests, "All navigation and functionality tests should pass");
    }
}