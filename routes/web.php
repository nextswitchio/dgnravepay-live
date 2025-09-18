<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CareerPostController;
use App\Http\Controllers\Admin\FaqController;
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
Route::view('/career', 'pages.career');
Route::view('/press', 'pages.press');
Route::view('/contact', 'pages.contact');
Route::view('/policy', 'pages.policy');
Route::view('/whistleblower', 'pages.whistleblower');

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);
Route::get('/career', [CareerController::class, 'index']);
Route::get('/career/{slug}', [CareerController::class, 'show']);

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
    Route::resource('career-posts', CareerPostController::class)->parameters([
        'career-posts' => 'career_post'
    ]);
    Route::resource('faqs', FaqController::class);
});
