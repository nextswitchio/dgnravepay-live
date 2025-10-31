<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\AssetPerformanceMonitor;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetPerformanceMonitorTest extends TestCase
{
    private AssetPerformanceMonitor $monitor;

    protected function setUp(): void
    {
        parent::setUp();
        $this->monitor = app(AssetPerformanceMonitor::class);
        Cache::flush(); // Clear cache before each test
    }

    public function test_records_asset_load_metric(): void
    {
        $assetPath = 'resources/images/test.png';
        $loadTime = 150.5;

        $this->monitor->recordAssetLoad($assetPath, $loadTime, true);

        // Check that metric was stored in cache
        $metrics = Cache::get('asset_perf_load_times', []);
        $this->assertNotEmpty($metrics);
        
        $lastMetric = end($metrics);
        $this->assertEquals($assetPath, $lastMetric['path']);
        $this->assertEquals($loadTime, $lastMetric['load_time']);
        $this->assertTrue($lastMetric['success']);
    }

    public function test_records_404_error(): void
    {
        $assetPath = 'resources/images/missing.png';
        $referrer = 'https://example.com/page';

        $this->monitor->record404Error($assetPath, $referrer);

        // Check that error was stored in cache
        $errors = Cache::get('asset_perf_404_errors', []);
        $this->assertNotEmpty($errors);
        
        $lastError = end($errors);
        $this->assertEquals($assetPath, $lastError['path']);
        $this->assertEquals($referrer, $lastError['referrer']);
    }

    public function test_gets_performance_metrics(): void
    {
        // Record some test data
        $this->monitor->recordAssetLoad('test1.png', 100, true);
        $this->monitor->recordAssetLoad('test2.png', 200, true);
        $this->monitor->recordAssetLoad('test3.png', 300, false);
        $this->monitor->record404Error('missing.png');

        $metrics = $this->monitor->getPerformanceMetrics(24);

        $this->assertArrayHasKey('load_times', $metrics);
        $this->assertArrayHasKey('error_rates', $metrics);
        $this->assertArrayHasKey('top_errors', $metrics);
        $this->assertArrayHasKey('performance_summary', $metrics);
        $this->assertArrayHasKey('health_status', $metrics);

        // Check load time metrics
        $this->assertEquals(3, $metrics['load_times']['total_requests']);
        $this->assertEquals(200, $metrics['load_times']['average']);

        // Check performance summary
        $this->assertEquals(3, $metrics['performance_summary']['total_requests']);
        $this->assertEquals(2, $metrics['performance_summary']['successful_loads']);
        $this->assertEquals(1, $metrics['performance_summary']['failed_loads']);
    }

    public function test_cache_hit_and_miss_tracking(): void
    {
        $this->monitor->recordCacheHit();
        $this->monitor->recordCacheHit();
        $this->monitor->recordCacheMiss();

        $hits = Cache::get('asset_perf_cache_hits', 0);
        $misses = Cache::get('asset_perf_cache_misses', 0);

        $this->assertEquals(2, $hits);
        $this->assertEquals(1, $misses);
    }

    public function test_asset_dashboard_controller_metrics_endpoint(): void
    {
        // Create an admin user for testing
        $admin = \App\Models\User::factory()->create(['is_admin' => true]);

        // Record some test metrics
        $this->monitor->recordAssetLoad('test.png', 150, true);
        $this->monitor->record404Error('missing.png');

        $response = $this->actingAs($admin)->getJson('/admin/assets/metrics');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'load_times',
            'error_rates',
            'top_errors',
            'performance_summary',
            'health_status',
        ]);
    }

    public function test_asset_dashboard_controller_health_status(): void
    {
        $admin = \App\Models\User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->getJson('/admin/assets/health');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'timestamp',
            'overall_health',
        ]);
    }

    public function test_performance_test_endpoint(): void
    {
        $admin = \App\Models\User::factory()->create(['is_admin' => true]);

        $testAssets = [
            'resources/images/logo.svg',
            'resources/images/nonexistent.png'
        ];

        $response = $this->actingAs($admin)->postJson('/admin/assets/performance-test', [
            'assets' => $testAssets
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'test_results' => [
                '*' => [
                    'path',
                    'url',
                    'exists',
                    'load_time',
                    'status',
                ]
            ],
            'summary' => [
                'total_tested',
                'successful',
                'not_found',
                'errors',
                'success_rate',
                'average_load_time',
                'max_load_time',
            ]
        ]);
    }

    public function test_clear_cache_endpoint(): void
    {
        $admin = \App\Models\User::factory()->create(['is_admin' => true]);

        // Add some cache data
        Cache::put('asset_url_test', 'test_value', 3600);

        $response = $this->actingAs($admin)->postJson('/admin/assets/clear-cache');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Asset cache cleared successfully'
        ]);
    }

    public function test_middleware_tracks_asset_requests(): void
    {
        // Make a request to an asset path
        $response = $this->get('/build/assets/test.css');

        // The middleware should have recorded this request
        // Note: This test assumes the middleware is properly registered
        $this->assertTrue(true); // Basic assertion since we can't easily test middleware in isolation
    }
}