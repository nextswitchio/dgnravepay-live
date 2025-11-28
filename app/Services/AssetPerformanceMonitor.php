<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssetPerformanceMonitor
{
    private const CACHE_PREFIX = 'asset_perf_';
    private const METRICS_TTL = 86400; // 24 hours
    
    /**
     * Record asset loading performance metric
     */
    public function recordAssetLoad(string $assetPath, float $loadTime, bool $success = true): void
    {
        $metric = [
            'path' => $assetPath,
            'load_time' => $loadTime,
            'success' => $success,
            'timestamp' => now()->toISOString(),
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip(),
        ];
        
        // Store in cache for quick access
        $this->storeMetric('load_times', $metric);
        
        // Log for persistent storage
        Log::channel('asset_performance')->info('Asset load metric', $metric);
        
        // Update aggregated metrics
        $this->updateAggregatedMetrics($assetPath, $loadTime, $success);
    }
    
    /**
     * Record 404 asset error
     */
    public function record404Error(string $assetPath, string $referrer = null): void
    {
        $error = [
            'path' => $assetPath,
            'referrer' => $referrer ?? request()->header('referer'),
            'timestamp' => now()->toISOString(),
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip(),
            'url' => request()->fullUrl(),
        ];
        
        // Store in cache
        $this->storeMetric('404_errors', $error);
        
        // Log error
        Log::channel('asset_errors')->warning('Asset 404 error', $error);
        
        // Update error counters
        $this->incrementErrorCounter($assetPath);
    }
    
    /**
     * Get performance metrics for dashboard
     */
    public function getPerformanceMetrics(int $hours = 24): array
    {
        $cacheKey = self::CACHE_PREFIX . "dashboard_metrics_{$hours}h";
        
        return Cache::remember($cacheKey, 300, function () use ($hours) {
            $since = now()->subHours($hours);
            
            return [
                'load_times' => $this->getLoadTimeMetrics($since),
                'error_rates' => $this->getErrorRateMetrics($since),
                'top_errors' => $this->getTopErrorPaths($since),
                'performance_summary' => $this->getPerformanceSummary($since),
                'health_status' => $this->getAssetHealthStatus(),
            ];
        });
    }
    
    /**
     * Get load time metrics
     */
    private function getLoadTimeMetrics(Carbon $since): array
    {
        $metrics = $this->getMetricsSince('load_times', $since);
        
        if (empty($metrics)) {
            return [
                'average' => 0,
                'median' => 0,
                'p95' => 0,
                'p99' => 0,
                'total_requests' => 0,
            ];
        }
        
        $loadTimes = array_column($metrics, 'load_time');
        sort($loadTimes);
        
        return [
            'average' => round(array_sum($loadTimes) / count($loadTimes), 3),
            'median' => $this->getPercentile($loadTimes, 50),
            'p95' => $this->getPercentile($loadTimes, 95),
            'p99' => $this->getPercentile($loadTimes, 99),
            'total_requests' => count($metrics),
        ];
    }
    
    /**
     * Get error rate metrics
     */
    private function getErrorRateMetrics(Carbon $since): array
    {
        $errors = $this->getMetricsSince('404_errors', $since);
        $loads = $this->getMetricsSince('load_times', $since);
        
        $totalRequests = count($loads);
        $errorCount = count($errors);
        
        return [
            'total_errors' => $errorCount,
            'total_requests' => $totalRequests,
            'error_rate' => $totalRequests > 0 ? round(($errorCount / $totalRequests) * 100, 2) : 0,
            'errors_by_hour' => $this->groupErrorsByHour($errors, $since),
        ];
    }
    
    /**
     * Get top error paths
     */
    private function getTopErrorPaths(Carbon $since, int $limit = 10): array
    {
        $errors = $this->getMetricsSince('404_errors', $since);
        
        $pathCounts = [];
        foreach ($errors as $error) {
            $path = $error['path'];
            $pathCounts[$path] = ($pathCounts[$path] ?? 0) + 1;
        }
        
        arsort($pathCounts);
        
        return array_slice($pathCounts, 0, $limit, true);
    }
    
    /**
     * Get performance summary
     */
    private function getPerformanceSummary(Carbon $since): array
    {
        $loads = $this->getMetricsSince('load_times', $since);
        $errors = $this->getMetricsSince('404_errors', $since);
        
        $successfulLoads = array_filter($loads, fn($load) => $load['success']);
        $failedLoads = array_filter($loads, fn($load) => !$load['success']);
        
        return [
            'total_requests' => count($loads),
            'successful_loads' => count($successfulLoads),
            'failed_loads' => count($failedLoads),
            'not_found_errors' => count($errors),
            'success_rate' => count($loads) > 0 ? round((count($successfulLoads) / count($loads)) * 100, 2) : 0,
        ];
    }
    
    /**
     * Get asset health status
     */
    private function getAssetHealthStatus(): array
    {
        $cacheKey = self::CACHE_PREFIX . 'health_status';
        
        return Cache::remember($cacheKey, 300, function () {
            return [
                'storage_accessible' => $this->checkStorageHealth(),
                'vite_manifest_exists' => $this->checkViteManifest(),
                'fallback_assets_available' => $this->checkFallbackAssets(),
                'cache_performance' => $this->getCachePerformance(),
            ];
        });
    }
    
    /**
     * Store metric in cache
     */
    private function storeMetric(string $type, array $metric): void
    {
        $cacheKey = self::CACHE_PREFIX . $type;
        $metrics = Cache::get($cacheKey, []);
        
        // Add new metric
        $metrics[] = $metric;
        
        // Keep only recent metrics (last 1000 entries)
        if (count($metrics) > 1000) {
            $metrics = array_slice($metrics, -1000);
        }
        
        Cache::put($cacheKey, $metrics, self::METRICS_TTL);
    }
    
    /**
     * Update aggregated metrics
     */
    private function updateAggregatedMetrics(string $assetPath, float $loadTime, bool $success): void
    {
        $cacheKey = self::CACHE_PREFIX . 'aggregated_' . md5($assetPath);
        $stats = Cache::get($cacheKey, [
            'total_requests' => 0,
            'total_load_time' => 0,
            'successful_requests' => 0,
            'failed_requests' => 0,
            'last_updated' => now()->toISOString(),
        ]);
        
        $stats['total_requests']++;
        $stats['total_load_time'] += $loadTime;
        
        if ($success) {
            $stats['successful_requests']++;
        } else {
            $stats['failed_requests']++;
        }
        
        $stats['average_load_time'] = $stats['total_load_time'] / $stats['total_requests'];
        $stats['success_rate'] = ($stats['successful_requests'] / $stats['total_requests']) * 100;
        $stats['last_updated'] = now()->toISOString();
        
        Cache::put($cacheKey, $stats, self::METRICS_TTL);
    }
    
    /**
     * Increment error counter for specific asset
     */
    private function incrementErrorCounter(string $assetPath): void
    {
        $cacheKey = self::CACHE_PREFIX . 'error_count_' . md5($assetPath);
        $count = Cache::get($cacheKey, 0);
        Cache::put($cacheKey, $count + 1, self::METRICS_TTL);
    }
    
    /**
     * Get metrics since specific time
     */
    private function getMetricsSince(string $type, Carbon $since): array
    {
        $cacheKey = self::CACHE_PREFIX . $type;
        $metrics = Cache::get($cacheKey, []);
        
        return array_filter($metrics, function ($metric) use ($since) {
            return Carbon::parse($metric['timestamp'])->gte($since);
        });
    }
    
    /**
     * Calculate percentile
     */
    private function getPercentile(array $values, int $percentile): float
    {
        if (empty($values)) {
            return 0;
        }
        
        $index = ($percentile / 100) * (count($values) - 1);
        $lower = floor($index);
        $upper = ceil($index);
        
        if ($lower == $upper) {
            return round($values[$lower], 3);
        }
        
        $weight = $index - $lower;
        return round($values[$lower] * (1 - $weight) + $values[$upper] * $weight, 3);
    }
    
    /**
     * Group errors by hour
     */
    private function groupErrorsByHour(array $errors, Carbon $since): array
    {
        $hours = [];
        $current = $since->copy()->startOfHour();
        $end = now()->startOfHour();
        
        while ($current->lte($end)) {
            $hours[$current->format('Y-m-d H:00')] = 0;
            $current->addHour();
        }
        
        foreach ($errors as $error) {
            $hour = Carbon::parse($error['timestamp'])->startOfHour()->format('Y-m-d H:00');
            if (isset($hours[$hour])) {
                $hours[$hour]++;
            }
        }
        
        return $hours;
    }
    
    /**
     * Check storage health
     */
    private function checkStorageHealth(): bool
    {
        try {
            return \Storage::disk('public')->exists('');
        } catch (\Exception $e) {
            return false;
        }
    }
    
    /**
     * Check Vite manifest
     */
    private function checkViteManifest(): bool
    {
        return file_exists(public_path('build/manifest.json'));
    }
    
    /**
     * Check fallback assets
     */
    private function checkFallbackAssets(): array
    {
        $fallbacks = config('assets.fallbacks', []);
        $status = [];
        
        foreach ($fallbacks as $type => $path) {
            if ($path) {
                $status[$type] = file_exists(resource_path('images/' . ltrim($path, 'resources/images/')));
            }
        }
        
        return $status;
    }
    
    /**
     * Get cache performance metrics
     */
    private function getCachePerformance(): array
    {
        $hitKey = self::CACHE_PREFIX . 'cache_hits';
        $missKey = self::CACHE_PREFIX . 'cache_misses';
        
        $hits = Cache::get($hitKey, 0);
        $misses = Cache::get($missKey, 0);
        $total = $hits + $misses;
        
        return [
            'hits' => $hits,
            'misses' => $misses,
            'hit_rate' => $total > 0 ? round(($hits / $total) * 100, 2) : 0,
        ];
    }
    
    /**
     * Record cache hit
     */
    public function recordCacheHit(): void
    {
        $key = self::CACHE_PREFIX . 'cache_hits';
        $current = Cache::get($key, 0);
        Cache::put($key, $current + 1, self::METRICS_TTL);
    }
    
    /**
     * Record cache miss
     */
    public function recordCacheMiss(): void
    {
        $key = self::CACHE_PREFIX . 'cache_misses';
        $current = Cache::get($key, 0);
        Cache::put($key, $current + 1, self::METRICS_TTL);
    }
}