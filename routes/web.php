<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ExchangeRateController as AdminExchangeRateController;

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

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::post('/inquiry', [HomeController::class, 'storeInquiry'])->name('inquiry.store');

// Blog Routes
Route::prefix('blog')->name('blogs.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{blog:slug}', [BlogController::class, 'show'])->name('show');
    Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login form)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Categories Management
        Route::resource('categories', CategoryController::class);
        Route::post('categories/reorder', [CategoryController::class, 'reorder'])->name('categories.reorder');
        
        // Blog Management
        Route::resource('blogs', AdminBlogController::class);
        Route::post('blogs/{blog}/toggle-status', [AdminBlogController::class, 'toggleStatus'])->name('blogs.toggle-status');
        
        // Inquiry Management
        Route::resource('inquiries', InquiryController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::post('inquiries/{inquiry}/respond', [InquiryController::class, 'respond'])->name('inquiries.respond');
        
        // Exchange Rate Management
        Route::get('exchange-rates', [AdminExchangeRateController::class, 'index'])->name('exchange-rates.index');
        Route::post('exchange-rates/refresh', [AdminExchangeRateController::class, 'refresh'])->name('exchange-rates.refresh');
    });
});