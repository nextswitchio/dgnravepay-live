# Asset Performance Monitoring

This document describes the asset performance monitoring system implemented to track asset loading performance, monitor 404 errors, and provide health monitoring for the asset system.

## Overview

The asset performance monitoring system consists of several components:

1. **AssetPerformanceMonitor Service** - Core service for recording and retrieving performance metrics
2. **AssetPerformanceMiddleware** - Middleware to automatically track asset requests
3. **AssetDashboardController** - Controller providing dashboard and API endpoints
4. **Asset Dashboard View** - Web interface for monitoring asset performance
5. **Console Commands** - CLI tools for generating performance reports

## Features

### Performance Metrics Collection

- **Load Time Tracking**: Records asset loading times in milliseconds
- **Success/Failure Tracking**: Monitors successful vs failed asset loads
- **404 Error Monitoring**: Specifically tracks assets that return 404 errors
- **Cache Performance**: Tracks cache hit/miss rates for asset URLs

### Dashboard Features

- **Real-time Metrics**: Live performance statistics with auto-refresh
- **Performance Charts**: Visual representation of load times and error trends
- **Health Status**: System health indicators for storage, Vite manifest, and fallback assets
- **Top Error Paths**: Lists most frequently failing asset paths
- **Performance Testing**: On-demand testing of specific asset paths

### Reporting

- **Console Reports**: Generate detailed performance reports via CLI
- **Export Options**: Export reports in table or JSON format
- **Historical Data**: Track performance trends over time

## Usage

### Accessing the Dashboard

Navigate to `/admin/assets/dashboard` (requires admin authentication) to view the asset performance dashboard.

### API Endpoints

- `GET /admin/assets/metrics` - Get performance metrics as JSON
- `GET /admin/assets/health` - Get system health status
- `GET /admin/assets/errors` - Get detailed error report
- `POST /admin/assets/performance-test` - Run performance test on specific assets
- `POST /admin/assets/clear-cache` - Clear asset cache

### Console Commands

Generate performance reports:

```bash
# Generate report for last 24 hours
php artisan assets:performance-report

# Generate report for specific time period
php artisan assets:performance-report --hours=48

# Export report to file
php artisan assets:performance-report --export=report.txt

# Generate JSON report
php artisan assets:performance-report --format=json --export=report.json
```

## Configuration

### Logging Channels

The system uses dedicated logging channels:

- `asset_performance` - Logs performance metrics
- `asset_errors` - Logs asset-related errors

### Cache Configuration

Performance metrics are cached using the following settings:

- **Cache Prefix**: `asset_perf_`
- **TTL**: 24 hours (86400 seconds)
- **Storage**: Uses default Laravel cache driver

### Environment Variables

Configure asset monitoring behavior:

```env
# Enable/disable asset existence checking
ASSET_CHECK_EXISTENCE=true

# Enable/disable external asset checking
ASSET_CHECK_EXTERNAL=false

# Enable/disable missing asset logging
ASSET_LOG_MISSING=true

# Cache settings
ASSET_CACHE_ENABLED=true
ASSET_CACHE_TTL=3600
```

## Metrics Collected

### Load Time Metrics

- Average load time
- Median load time
- 95th percentile load time
- 99th percentile load time
- Total requests

### Error Metrics

- Total 404 errors
- Error rate percentage
- Errors by hour
- Top error paths with counts

### Health Metrics

- Storage accessibility
- Vite manifest existence
- Fallback asset availability
- Cache performance statistics

## Integration

### Automatic Tracking

The `AssetPerformanceMiddleware` automatically tracks:

- All asset requests (CSS, JS, images, fonts)
- Load times for each request
- Success/failure status
- 404 errors with referrer information

### Manual Tracking

You can manually record metrics in your code:

```php
use App\Services\AssetPerformanceMonitor;

$monitor = app(AssetPerformanceMonitor::class);

// Record asset load
$monitor->recordAssetLoad('path/to/asset.png', 150.5, true);

// Record 404 error
$monitor->record404Error('path/to/missing.png', 'https://example.com/referrer');

// Record cache hit/miss
$monitor->recordCacheHit();
$monitor->recordCacheMiss();
```

## Performance Considerations

- Metrics are stored in cache for fast access
- Historical data is logged to files for persistence
- Dashboard auto-refreshes every 30 seconds
- Cache is automatically cleaned to prevent memory issues
- External asset checking is disabled by default for performance

## Troubleshooting

### High Memory Usage

If cache memory usage becomes high:

1. Reduce cache TTL in configuration
2. Use the clear cache endpoint regularly
3. Consider using Redis for cache storage

### Missing Metrics

If metrics are not appearing:

1. Verify middleware is registered in `app/Http/Kernel.php`
2. Check that the service is registered in `AppServiceProvider`
3. Ensure logging channels are properly configured
4. Verify cache is working correctly

### Dashboard Not Loading

If the dashboard is not accessible:

1. Ensure user has admin privileges
2. Check that routes are properly registered
3. Verify all required views exist
4. Check for JavaScript errors in browser console

## Security

- Dashboard requires admin authentication
- Asset paths are validated to prevent directory traversal
- Input sanitization is applied to all user inputs
- Cache keys are hashed to prevent conflicts