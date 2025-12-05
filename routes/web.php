<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CareerPostController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PressItemController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'pages.index');
Route::view('/business', 'pages.business');
Route::view('/about', 'pages.about');
Route::view('/savings', 'pages.savings');
Route::view('/virtual', 'pages.virtual');
Route::get('/press', [App\Http\Controllers\PressController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::view('/policy', 'pages.policy');
Route::view('/whistleblower', 'pages.whistleblower');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms');
Route::view('/pos', 'pages.pos');
Route::view('/loan', 'pages.loan');
Route::view('/travel', 'pages.travel');
Route::view('/business-management', 'pages.business-management');
Route::view('/payroll', 'pages.payroll');
Route::view('/invoice', 'pages.invoice');

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/career', [CareerController::class, 'index']);
Route::get('/career/{slug}', [CareerController::class, 'show']);
Route::post('/partnership-request', [App\Http\Controllers\PartnershipRequestController::class, 'store'])->name('partnership.store');

// Fallback for serving files from storage when symlinks are not supported on the host
Route::get('/storage/{path}', function (string $path) {
    $base = storage_path('app/public');
    $fullPath = realpath($base . DIRECTORY_SEPARATOR . $path);
    if ($fullPath === false || !str_starts_with($fullPath, $base) || !is_file($fullPath)) {
        abort(404);
    }
    return response()->file($fullPath, [
        'Cache-Control' => 'public, max-age=31536000'
    ]);
})->where('path', '.*');

// Sitemap
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'application/xml');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('blog-posts', BlogPostController::class)->parameters([
        'blog-posts' => 'blog_post'
    ]);
    Route::post('blog-posts/{blog_post}/toggle-publish', [BlogPostController::class, 'togglePublish'])
        ->name('blog-posts.toggle-publish');
    Route::resource('career-posts', CareerPostController::class)->parameters([
        'career-posts' => 'career_post'
    ]);
    Route::post('career-posts/{career_post}/toggle-publish', [CareerPostController::class, 'togglePublish'])
        ->name('career-posts.toggle-publish');
    Route::resource('faqs', FaqController::class);
    Route::post('faqs/{faq}/toggle-publish', [FaqController::class, 'togglePublish'])->name('faqs.toggle-publish');
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('states', StateController::class);
    Route::post('states/{state}/toggle-active', [StateController::class, 'toggleActive'])
        ->name('states.toggle-active');
    Route::resource('branches', BranchController::class);
    Route::post('branches/{branch}/toggle-active', [BranchController::class, 'toggleActive'])
        ->name('branches.toggle-active');
    Route::resource('press-items', PressItemController::class)->parameters([
        'press-items' => 'press_item'
    ]);
    Route::post('press-items/{press_item}/toggle-publish', [PressItemController::class, 'togglePublish'])
        ->name('press-items.toggle-publish');
    Route::resource('partnership-requests', App\Http\Controllers\Admin\PartnershipRequestController::class)
        ->only(['index', 'show', 'update', 'destroy']);
    
    // Asset Performance Dashboard
    Route::get('assets/dashboard', [App\Http\Controllers\AssetDashboardController::class, 'index'])->name('assets.dashboard');
    Route::get('assets/metrics', [App\Http\Controllers\AssetDashboardController::class, 'metrics'])->name('assets.metrics');
    Route::get('assets/health', [App\Http\Controllers\AssetDashboardController::class, 'healthStatus'])->name('assets.health');
    Route::get('assets/errors', [App\Http\Controllers\AssetDashboardController::class, 'errorReport'])->name('assets.errors');
    Route::post('assets/performance-test', [App\Http\Controllers\AssetDashboardController::class, 'performanceTest'])->name('assets.performance-test');
    Route::post('assets/clear-cache', [App\Http\Controllers\AssetDashboardController::class, 'clearCache'])->name('assets.clear-cache');
});
