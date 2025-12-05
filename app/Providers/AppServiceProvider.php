<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\AssetPerformanceMonitor::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fix for older MySQL/MariaDB versions with 1000-byte index limit
        Schema::defaultStringLength(191);
        
        // Force HTTPS in production and ensure proper URL generation for both www and non-www
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        
        // Ensure asset URLs work with both www and non-www domains
        if (request()->getHost()) {
            $scheme = request()->isSecure() ? 'https' : 'http';
            $host = request()->getHttpHost();
            $baseUrl = $scheme . '://' . $host;
            
            // Update both app.url and app.asset_url to ensure consistency
            config(['app.url' => $baseUrl]);
            config(['app.asset_url' => $baseUrl]);
            
            // Also set the asset URL for Laravel's asset() helper
            app('url')->forceRootUrl($baseUrl);
        }
        
        // Validate asset configuration and fallback files
        $this->validateAssetConfiguration();
    }
    
    /**
     * Validate asset configuration and ensure fallback files exist
     */
    private function validateAssetConfiguration(): void
    {
        // Only validate in non-production environments to avoid performance impact
        if (config('app.env') === 'production') {
            return;
        }
        
        $fallbacks = config('assets.fallbacks', []);
        
        foreach ($fallbacks as $type => $fallbackPath) {
            if (!$fallbackPath) {
                continue;
            }
            
            // Check if fallback file exists for static assets
            if ($type !== 'storage') {
                $resourcePath = resource_path('images/' . ltrim($fallbackPath, 'resources/images/'));
                if (!file_exists($resourcePath)) {
                    logger()->warning("Asset fallback file not found: {$fallbackPath} (checked: {$resourcePath})");
                }
            }
        }
    }
}
