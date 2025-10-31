<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AssetPerformanceMonitor;
use App\Helpers\AssetHelper;

class AssetPerformanceReport extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'assets:performance-report 
                            {--hours=24 : Number of hours to analyze}
                            {--format=table : Output format (table, json)}
                            {--export= : Export to file path}';

    /**
     * The console command description.
     */
    protected $description = 'Generate asset performance report';

    private AssetPerformanceMonitor $monitor;

    public function __construct(AssetPerformanceMonitor $monitor)
    {
        parent::__construct();
        $this->monitor = $monitor;
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $hours = $this->option('hours');
        $format = $this->option('format');
        $exportPath = $this->option('export');

        $this->info("Generating asset performance report for the last {$hours} hours...");

        // Get performance metrics
        $metrics = $this->monitor->getPerformanceMetrics($hours);
        
        // Get health status
        $healthStatus = AssetHelper::getAssetHealthStatus();

        if ($format === 'json') {
            $this->outputJson($metrics, $healthStatus, $exportPath);
        } else {
            $this->outputTable($metrics, $healthStatus, $exportPath);
        }

        return 0;
    }

    /**
     * Output report in table format
     */
    private function outputTable(array $metrics, array $healthStatus, ?string $exportPath): void
    {
        $output = [];

        // Performance Summary
        $this->info("\n=== PERFORMANCE SUMMARY ===");
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Requests', $metrics['performance_summary']['total_requests']],
                ['Successful Loads', $metrics['performance_summary']['successful_loads']],
                ['Failed Loads', $metrics['performance_summary']['failed_loads']],
                ['404 Errors', $metrics['performance_summary']['not_found_errors']],
                ['Success Rate', $metrics['performance_summary']['success_rate'] . '%'],
            ]
        );

        // Load Time Metrics
        $this->info("\n=== LOAD TIME METRICS ===");
        $this->table(
            ['Metric', 'Value (ms)'],
            [
                ['Average', $metrics['load_times']['average']],
                ['Median', $metrics['load_times']['median']],
                ['95th Percentile', $metrics['load_times']['p95']],
                ['99th Percentile', $metrics['load_times']['p99']],
            ]
        );

        // Error Rates
        $this->info("\n=== ERROR ANALYSIS ===");
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Errors', $metrics['error_rates']['total_errors']],
                ['Error Rate', $metrics['error_rates']['error_rate'] . '%'],
            ]
        );

        // Top Error Paths
        if (!empty($metrics['top_errors'])) {
            $this->info("\n=== TOP ERROR PATHS ===");
            $errorData = [];
            foreach ($metrics['top_errors'] as $path => $count) {
                $errorData[] = [$path, $count];
            }
            $this->table(['Path', 'Error Count'], array_slice($errorData, 0, 10));
        }

        // Health Status
        $this->info("\n=== SYSTEM HEALTH ===");
        $healthData = [
            ['Storage Accessible', $healthStatus['storage_accessible'] ? '✓' : '✗'],
            ['Vite Manifest Exists', $healthStatus['vite_manifest_exists'] ? '✓' : '✗'],
        ];

        foreach ($healthStatus['fallback_assets_exist'] ?? [] as $type => $exists) {
            $healthData[] = [ucfirst($type) . ' Fallback', $exists ? '✓' : '✗'];
        }

        $this->table(['Component', 'Status'], $healthData);

        // Errors
        if (!empty($healthStatus['errors'])) {
            $this->error("\n=== SYSTEM ERRORS ===");
            foreach ($healthStatus['errors'] as $error) {
                $this->error("• {$error}");
            }
        }

        // Export to file if requested
        if ($exportPath) {
            $this->exportTableReport($metrics, $healthStatus, $exportPath);
        }
    }

    /**
     * Output report in JSON format
     */
    private function outputJson(array $metrics, array $healthStatus, ?string $exportPath): void
    {
        $report = [
            'generated_at' => now()->toISOString(),
            'period_hours' => $this->option('hours'),
            'performance_metrics' => $metrics,
            'health_status' => $healthStatus,
        ];

        $json = json_encode($report, JSON_PRETTY_PRINT);

        if ($exportPath) {
            file_put_contents($exportPath, $json);
            $this->info("Report exported to: {$exportPath}");
        } else {
            $this->line($json);
        }
    }

    /**
     * Export table report to file
     */
    private function exportTableReport(array $metrics, array $healthStatus, string $exportPath): void
    {
        $content = "ASSET PERFORMANCE REPORT\n";
        $content .= "Generated: " . now()->toDateTimeString() . "\n";
        $content .= "Period: Last " . $this->option('hours') . " hours\n\n";

        $content .= "PERFORMANCE SUMMARY\n";
        $content .= "==================\n";
        $content .= "Total Requests: " . $metrics['performance_summary']['total_requests'] . "\n";
        $content .= "Successful Loads: " . $metrics['performance_summary']['successful_loads'] . "\n";
        $content .= "Failed Loads: " . $metrics['performance_summary']['failed_loads'] . "\n";
        $content .= "404 Errors: " . $metrics['performance_summary']['not_found_errors'] . "\n";
        $content .= "Success Rate: " . $metrics['performance_summary']['success_rate'] . "%\n\n";

        $content .= "LOAD TIME METRICS\n";
        $content .= "=================\n";
        $content .= "Average: " . $metrics['load_times']['average'] . "ms\n";
        $content .= "Median: " . $metrics['load_times']['median'] . "ms\n";
        $content .= "95th Percentile: " . $metrics['load_times']['p95'] . "ms\n";
        $content .= "99th Percentile: " . $metrics['load_times']['p99'] . "ms\n\n";

        $content .= "ERROR ANALYSIS\n";
        $content .= "==============\n";
        $content .= "Total Errors: " . $metrics['error_rates']['total_errors'] . "\n";
        $content .= "Error Rate: " . $metrics['error_rates']['error_rate'] . "%\n\n";

        if (!empty($metrics['top_errors'])) {
            $content .= "TOP ERROR PATHS\n";
            $content .= "===============\n";
            foreach ($metrics['top_errors'] as $path => $count) {
                $content .= "{$path}: {$count} errors\n";
            }
            $content .= "\n";
        }

        $content .= "SYSTEM HEALTH\n";
        $content .= "=============\n";
        $content .= "Storage Accessible: " . ($healthStatus['storage_accessible'] ? 'Yes' : 'No') . "\n";
        $content .= "Vite Manifest Exists: " . ($healthStatus['vite_manifest_exists'] ? 'Yes' : 'No') . "\n";

        foreach ($healthStatus['fallback_assets_exist'] ?? [] as $type => $exists) {
            $content .= ucfirst($type) . " Fallback: " . ($exists ? 'Yes' : 'No') . "\n";
        }

        if (!empty($healthStatus['errors'])) {
            $content .= "\nSYSTEM ERRORS\n";
            $content .= "=============\n";
            foreach ($healthStatus['errors'] as $error) {
                $content .= "• {$error}\n";
            }
        }

        file_put_contents($exportPath, $content);
        $this->info("Report exported to: {$exportPath}");
    }
}