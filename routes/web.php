<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/products', [HomeController::class, 'products'])->name('products');
    Route::get('/offers', [HomeController::class, 'offers'])->name('offers');
    Route::get('/support', [HomeController::class, 'support'])->name('support');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('password.request');
    Route::post('/forgot-password', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [LoginController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Dashboard Routes (Solo para admins)
    Route::middleware('admin')->prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/users', 'users')->name('users');
        Route::get('/products', 'products')->name('products');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/analytics', 'analytics')->name('analytics');
        Route::get('/reports', 'reports')->name('reports');
        Route::get('/settings', 'settings')->name('settings');
    });

    // Admin Product Routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class);
        Route::delete('products/{product}/images/{image}', [ProductController::class, 'removeImage'])
            ->name('products.remove-image');
    });
});
