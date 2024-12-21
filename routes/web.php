<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

// Route utama untuk CRUD blog
Route::resource('blogs', BlogController::class);

// Route untuk menyimpan komentar pada blog
Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('comments', CommentController::class)->except(['create', 'store']); // Untuk admin atau pengelolaan komentar.
