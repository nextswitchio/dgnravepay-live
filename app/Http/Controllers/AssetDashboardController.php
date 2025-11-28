<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Services\AssetPerformanceMonitor;
use App\Helpers\AssetHelper;

class AssetDashboardController extends Controller
{
    private AssetPerformanceMonitor $monitor;
    
    public function __construct(AssetPerformanceMonitor $monitor)
    {
        $this->monitor = $monitor;
    }
    
    /**
     * Display the asset dashboard
     */
    public function index(): View
    {
        $metrics = $this->monitor->getPerformanceMetrics(24);
        
        return view('admin.asset-dashboard', compact('metrics'));
    }
    
    /**
     * Get performance metrics as JSON
     */
    public function metrics(Request $request): JsonResponse
    {
        $hours = $request->get('hours', 24);
        $metrics = $this->monitor->getPerformanceMetrics($hours);
        
        return response()->json($metrics);
    }
    
    /**
     * Get real-time asset health status
     */
    public function healthStatus(): JsonResponse
    {
        $status = AssetHelper::getAssetHealthStatus();
        
        return response()->json([
            'status' => $status,
            'timestamp' => now()->toISOString(),
            'overall_health' => $this->calculateOverallHealth($status),
        ]);
    }
    
    /**
     * Get detailed error report
     */
    public function errorReport(Request $request): JsonResponse
    {
        $hours = $request->get('hours', 24);
        $metrics = $this->monitor->getPerformanceMetrics($hours);
        
        return response()->json([
            'error_summary' => $metrics['error_rates'],
            'top_errors' => $metrics['top_errors'],
            'recommendations' => $this->generateRecommendations($metrics),
        ]);
    }
    
    /**
     * Test asset loading performance
     */
    public function performanceTest(Request $request): JsonResponse
    {
        $assetPaths = $request->get('assets', []);
        $results = [];
        
        foreach ($assetPaths as $path) {
            $startTime = microtime(true);
            
            try {
                $url = AssetHelper::detect($path);
                $exists = AssetHelper::assetExists($path);
                $loadTime = (microtime(true) - $startTime) * 1000;
                
                $results[] = [
                    'path' => $path,
                    'url' => $url,
                    'exists' => $exists,
                    'load_time' => round($loadTime, 3),
                    'status' => $exists ? 'success' : 'not_found',
                ];
                
                // Record the test metric
                $this->monitor->recordAssetLoad($path, $loadTime, $exists);
                
            } catch (\Exception $e) {
                $loadTime = (microtime(true) - $startTime) * 1000;
                
                $results[] = [
                    'path' => $path,
                    'url' => null,
                    'exists' => false,
                    'load_time' => round($loadTime, 3),
                    'status' => 'error',
                    'error' => $e->getMessage(),
                ];
                
                $this->monitor->recordAssetLoad($path, $loadTime, false);
            }
        }
        
        return response()->json([
            'test_results' => $results,
            'summary' => $this->summarizeTestResults($results),
        ]);
    }
    
    /**
     * Clear performance metrics cache
     */
    public function clearCache(): JsonResponse
    {
        try {
            AssetHelper::clearAssetCache();
            
            return response()->json([
                'success' => true,
                'message' => 'Asset cache cleared successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to clear cache: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    /**
     * Calculate overall health score
     */
    private function calculateOverallHealth(array $status): array
    {
        $score = 100;
        $issues = [];
        
        // Check storage accessibility
        if (!$status['storage_accessible']) {
            $score -= 30;
            $issues[] = 'Storage disk not accessible';
        }
        
        // Check Vite manifest
        if (!$status['vite_manifest_exists']) {
            $score -= 20;
            $issues[] = 'Vite manifest missing';
        }
        
        // Check fallback assets
        $fallbackCount = count($status['fallback_assets_exist'] ?? []);
        $missingFallbacks = array_filter($status['fallback_assets_exist'] ?? [], fn($exists) => !$exists);
        
        if (!empty($missingFallbacks)) {
            $score -= (count($missingFallbacks) / max($fallbackCount, 1)) * 20;
            $issues[] = count($missingFallbacks) . ' fallback assets missing';
        }
        
        // Check for errors
        if (!empty($status['errors'])) {
            $score -= min(count($status['errors']) * 5, 30);
            $issues = array_merge($issues, $status['errors']);
        }
        
        $score = max(0, $score);
        
        return [
            'score' => $score,
            'status' => $this->getHealthStatusLabel($score),
            'issues' => $issues,
        ];
    }
    
    /**
     * Get health status label based on score
     */
    private function getHealthStatusLabel(int $score): string
    {
        if ($score >= 90) return 'excellent';
        if ($score >= 75) return 'good';
        if ($score >= 50) return 'fair';
        if ($score >= 25) return 'poor';
        return 'critical';
    }
    
    /**
     * Generate recommendations based on metrics
     */
    private function generateRecommendations(array $metrics): array
    {
        $recommendations = [];
        
        // Check error rate
        if ($metrics['error_rates']['error_rate'] > 5) {
            $recommendations[] = [
                'type' => 'high_error_rate',
                'message' => 'High asset error rate detected. Consider checking asset paths and availability.',
                'priority' => 'high',
            ];
        }
        
        // Check performance
        if ($metrics['load_times']['average'] > 1000) {
            $recommendations[] = [
                'type' => 'slow_loading',
                'message' => 'Average asset load time is high. Consider optimizing assets or CDN configuration.',
                'priority' => 'medium',
            ];
        }
        
        // Check top errors
        if (count($metrics['top_errors']) > 10) {
            $recommendations[] = [
                'type' => 'many_missing_assets',
                'message' => 'Many different assets are missing. Review asset references in templates.',
                'priority' => 'high',
            ];
        }
        
        // Check cache performance
        if (isset($metrics['health_status']['cache_performance']['hit_rate']) && 
            $metrics['health_status']['cache_performance']['hit_rate'] < 70) {
            $recommendations[] = [
                'type' => 'low_cache_hit_rate',
                'message' => 'Low cache hit rate. Consider increasing cache TTL or reviewing cache strategy.',
                'priority' => 'medium',
            ];
        }
        
        return $recommendations;
    }
    
    /**
     * Summarize test results
     */
    private function summarizeTestResults(array $results): array
    {
        $total = count($results);
        $successful = count(array_filter($results, fn($r) => $r['status'] === 'success'));
        $notFound = count(array_filter($results, fn($r) => $r['status'] === 'not_found'));
        $errors = count(array_filter($results, fn($r) => $r['status'] === 'error'));
        
        $loadTimes = array_column($results, 'load_time');
        
        return [
            'total_tested' => $total,
            'successful' => $successful,
            'not_found' => $notFound,
            'errors' => $errors,
            'success_rate' => $total > 0 ? round(($successful / $total) * 100, 2) : 0,
            'average_load_time' => $total > 0 ? round(array_sum($loadTimes) / $total, 3) : 0,
            'max_load_time' => $total > 0 ? max($loadTimes) : 0,
        ];
    }
}