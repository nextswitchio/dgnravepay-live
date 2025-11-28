<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NormalizeDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only process GET requests to avoid issues with form submissions
        if (!$request->isMethod('GET')) {
            return $next($request);
        }

        $host = $request->getHost();
        $preferredDomain = config('app.preferred_domain', 'non-www');
        
        // Determine if we need to redirect
        $shouldRedirect = false;
        $newHost = $host;
        
        if ($preferredDomain === 'www') {
            // Prefer www version
            if (!str_starts_with($host, 'www.')) {
                $shouldRedirect = true;
                $newHost = 'www.' . $host;
            }
        } else {
            // Prefer non-www version (default)
            if (str_starts_with($host, 'www.')) {
                $shouldRedirect = true;
                $newHost = substr($host, 4);
            }
        }
        
        if ($shouldRedirect) {
            $scheme = $request->isSecure() ? 'https' : 'http';
            $fullUrl = $scheme . '://' . $newHost . $request->getRequestUri();
            
            // Use 301 (permanent redirect) for SEO benefits
            return redirect($fullUrl, 301);
        }
        
        return $next($request);
    }
}