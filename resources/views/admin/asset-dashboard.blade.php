@extends('admin.layout')

@section('page_title', 'Asset Performance Dashboard')
@section('page_subtitle', 'Monitor asset loading performance and health status')

@section('content')
<div>

    <!-- Health Status Overview -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Requests</p>
                    <p class="text-2xl font-semibold text-gray-900" id="total-requests">{{ $metrics['performance_summary']['total_requests'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Success Rate</p>
                    <p class="text-2xl font-semibold text-gray-900" id="success-rate">{{ $metrics['performance_summary']['success_rate'] }}%</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Avg Load Time</p>
                    <p class="text-2xl font-semibold text-gray-900" id="avg-load-time">{{ $metrics['load_times']['average'] }}ms</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-red-100 rounded-lg">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">404 Errors</p>
                    <p class="text-2xl font-semibold text-gray-900" id="error-count">{{ $metrics['error_rates']['total_errors'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Load Time Distribution -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Load Time Distribution</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Average</span>
                    <span class="font-medium">{{ $metrics['load_times']['average'] }}ms</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Median</span>
                    <span class="font-medium">{{ $metrics['load_times']['median'] }}ms</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">95th Percentile</span>
                    <span class="font-medium">{{ $metrics['load_times']['p95'] }}ms</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">99th Percentile</span>
                    <span class="font-medium">{{ $metrics['load_times']['p99'] }}ms</span>
                </div>
            </div>
        </div>

        <!-- Error Rate Trends -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Error Rate Trends</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Total Errors</span>
                    <span class="font-medium text-red-600">{{ $metrics['error_rates']['total_errors'] }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Error Rate</span>
                    <span class="font-medium {{ $metrics['error_rates']['error_rate'] > 5 ? 'text-red-600' : 'text-green-600' }}">
                        {{ $metrics['error_rates']['error_rate'] }}%
                    </span>
                </div>
                <div class="mt-4">
                    <canvas id="errorTrendChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Error Paths -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Top Error Paths</h3>
        </div>
        <div class="p-6">
            @if(empty($metrics['top_errors']))
                <p class="text-gray-500 text-center py-4">No errors recorded in the selected time period</p>
            @else
                <div class="space-y-3">
                    @foreach($metrics['top_errors'] as $path => $count)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <span class="font-mono text-sm text-gray-700">{{ $path }}</span>
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $count }} errors
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Health Status -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">System Health Status</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 rounded-full {{ $metrics['health_status']['storage_accessible'] ? 'bg-green-500' : 'bg-red-500' }}"></div>
                    <span class="text-sm">Storage Accessible</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 rounded-full {{ $metrics['health_status']['vite_manifest_exists'] ? 'bg-green-500' : 'bg-red-500' }}"></div>
                    <span class="text-sm">Vite Manifest</span>
                </div>
                @foreach($metrics['health_status']['fallback_assets_available'] ?? [] as $type => $available)
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full {{ $available ? 'bg-green-500' : 'bg-red-500' }}"></div>
                        <span class="text-sm">{{ ucfirst($type) }} Fallback</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex space-x-4">
        <button id="refresh-data" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
            Refresh Data
        </button>
        <button id="clear-cache" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium">
            Clear Cache
        </button>
        <button id="run-test" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium">
            Run Performance Test
        </button>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize error trend chart
    const ctx = document.getElementById('errorTrendChart').getContext('2d');
    const errorData = @json($metrics['error_rates']['errors_by_hour']);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(errorData),
            datasets: [{
                label: 'Errors per Hour',
                data: Object.values(errorData),
                borderColor: 'rgb(239, 68, 68)',
                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Refresh data button
    document.getElementById('refresh-data').addEventListener('click', function() {
        location.reload();
    });

    // Clear cache button
    document.getElementById('clear-cache').addEventListener('click', function() {
        fetch('/admin/assets/clear-cache', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                location.reload();
            }
        });
    });

    // Run performance test button
    document.getElementById('run-test').addEventListener('click', function() {
        const testAssets = [
            'resources/images/logo.svg',
            'resources/images/article 1.jpg',
            'resources/images/user.svg'
        ];

        fetch('/admin/assets/performance-test', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ assets: testAssets })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Performance test results:', data);
            alert(`Test completed. Success rate: ${data.summary.success_rate}%`);
        });
    });

    // Auto-refresh every 30 seconds
    setInterval(function() {
        fetch('/admin/assets/metrics')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-requests').textContent = data.performance_summary.total_requests;
                document.getElementById('success-rate').textContent = data.performance_summary.success_rate + '%';
                document.getElementById('avg-load-time').textContent = data.load_times.average + 'ms';
                document.getElementById('error-count').textContent = data.error_rates.total_errors;
            });
    }, 30000);
});
</script>
@endpush
@endsection