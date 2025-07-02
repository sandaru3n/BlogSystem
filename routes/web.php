<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\CategoryController; // Uncomment if you create this controller
use Illuminate\Support\Facades\Auth;

// Frontend Routes
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);



// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    
    Route::middleware('role:admin')->group(function () {
        Route::resource('posts', PostController::class);
        // Route::resource('categories', CategoryController::class); // Uncomment if you create this controller
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
