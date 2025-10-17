<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CareerPostController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
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
Route::view('/press', 'pages.press');
Route::view('/contact', 'pages.contact');
Route::view('/policy', 'pages.policy');
Route::view('/whistleblower', 'pages.whistleblower');
Route::view('/privacy', 'pages.privacy');
Route::view('/terms', 'pages.terms');
Route::view('/pos', 'pages.pos');
Route::view('/loan', 'pages.loan');
Route::view('/travel', 'pages.travel');

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/career', [CareerController::class, 'index']);
Route::get('/career/{slug}', [CareerController::class, 'show']);

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
});
