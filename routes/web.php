<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\pagesController;

// Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::prefix('admin')->middleware('auth', 'check_user')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashbord')->middleware('check_admin');
    Route::resource('category', categoryController::class);
    Route::resource('post', postController::class);
});
Route::get('/', [pagesController::class, 'index'])->name('index');
Route::get('slug/{slug}', [pagesController::class, 'slug'])->name('index.slug');
Route::get('/about', [pagesController::class, 'about'])->name('about');
Route::get('/contact', [pagesController::class, 'contact'])->name('contact');
Route::post('/contact', [pagesController::class, 'contactUs'])->name('contact');
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
