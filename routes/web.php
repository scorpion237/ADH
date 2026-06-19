<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\SettingController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles/{slug}', [HomeController::class, 'showArticle'])->name('articles.show');
Route::get('/projects/{slug}', [HomeController::class, 'showProject'])->name('projects.show');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Admin Auth routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Admin protected routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('stats', StatController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});
