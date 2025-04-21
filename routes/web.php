<?php

use App\Models\Post;
use App\Models\Article;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomingMailExportController;

// home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Daftar artikel
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Artikel tunggal berdasarkan slug
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/authors/{username}', [ArticleController::class, 'postsByAuthor'])->name('authors.posts');
Route::get('category/{slug}', [CategoryController::class, 'show'])->name('categories.show');


// Static routes for lyrics
Route::get('/lyrics', function () {
    return view('lyrics.index');
});

Route::get('/lyrics/{id}', function ($id) {
    return view('lyrics.show');
});

// about
Route::get('/about', function () {
    return view('about');
});

// Schedule
Route::get('/schedule', function () {
    return view('schedule.index');
});

// export-pdf for incoming_mail and outcoming_mail

