<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AssetPerformanceMonitor;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class AssetPerformanceMiddleware
{
    private AssetPerformanceMonitor $monitor;
    
    public function __construct(AssetPerformanceMonitor $monitor)
    {
        $this->monitor = $monitor;
    }
    
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): SymfonyResponse
    {
        $startTime = microtime(true);
        
        $response = $next($request);
        
        $endTime = microtime(true);
        $loadTime = ($endTime - $startTime) * 1000; // Convert to milliseconds
        
        // Only track asset requests
        if ($this->isAssetRequest($request)) {
            $assetPath = $request->getPathInfo();
            $success = $response->getStatusCode() < 400;
            
            // Record the performance metric
            $this->monitor->recordAssetLoad($assetPath, $loadTime, $success);
            
            // Record 404 errors specifically
            if ($response->getStatusCode() === 404) {
                $this->monitor->record404Error($assetPath, $request->header('referer'));
            }
        }
        
        return $response;
    }
    
    /**
     * Determine if the request is for an asset
     */
    private function isAssetRequest(Request $request): bool
    {
        $path = $request->getPathInfo();
        
        // Check for common asset paths
        $assetPaths = [
            '/build/assets/',
            '/storage/',
            '/assets/',
            '/images/',
            '/css/',
            '/js/',
        ];
        
        foreach ($assetPaths as $assetPath) {
            if (str_starts_with($path, $assetPath)) {
                return true;
            }
        }
        
        // Check for common asset extensions
        $assetExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'webp', 'ico', 'woff', 'woff2', 'ttf', 'eot'];
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        
        return in_array(strtolower($extension), $assetExtensions);
    }
}