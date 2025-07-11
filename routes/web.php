<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

// Frontend Routes
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/post/{post:slug}/comment', [PostController::class, 'storeComment'])->middleware('auth')->name('post.comment');



// Admin Routes
// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::get('/', [AdminController::class, 'dashboard']);
//     
//     Route::middleware('role:admin')->group(function () {
//         Route::resource('posts', PostController::class);
//         // Route::resource('categories', CategoryController::class); // Uncomment if you create this controller
//     });
// });

// Admin Panel Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/manage-posts', [PostController::class, 'index'])->name('manage-posts');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});

// Admin profile routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/profile/edit', [App\Http\Controllers\AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::post('/profile/update', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

// Admin slider routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('sliders', App\Http\Controllers\AdminSliderController::class)->except(['show']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
