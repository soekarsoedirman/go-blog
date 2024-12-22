<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;


// Rute default untuk URL '/'
Route::get('/', [BlogController::class, 'index'])->name('home');

// Rute resource untuk blogs
Route::resource('blogs', BlogController::class)->middleware('auth');

// Route untuk menyimpan komentar pada blog
Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('comments', CommentController::class)->except(['create', 'store']); // Untuk admin atau pengelolaan komentar.

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
