<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\LoginController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Admin\UserController;

/*
|--------------------------------------------------------------------------
| API Routes for Admin
|--------------------------------------------------------------------------
|
| Here we define API routes for the admin part of the application. These
| routes utilize the "api" middleware group and are prefixed with "admin".
|
*/

Route::prefix('admin')->group(function () {
    // Public route for admin login
    Route::post('/login', [LoginController::class, 'index'])->name('admin.login');

    // Protected routes for logged-in admin users
    Route::middleware('auth:api_admin')->group(function () {
        // Get the authenticated admin user's data
        Route::get('/user', [LoginController::class, 'getUser'])->name('admin.user');

        // Refresh JWT token
        Route::get('/refresh', [LoginController::class, 'refreshToken'])->name('admin.refresh');

        // Admin logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        // Categories resource
        Route::apiResource('/categories', CategoryController::class)->except(['create', 'edit'])->names('admin.categories');
        
        // Product resource
        Route::apiResource('/products', ProductController::class)->except(['create', 'edit'])->names('admin.products');

        // Slider resource
        Route::apiResource('/sliders', SliderController::class)->except(['create', 'show', 'edit', 'update'])->names('admin.sliders');

        // user resource
        Route::apiResource('/users', UserController::class)->except(['create', 'edit'])->names('admin.users');
    });
});
