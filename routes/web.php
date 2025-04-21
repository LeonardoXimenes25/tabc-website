<?php

use App\Models\Post;
use App\Models\Article;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategorySongController;
use App\Http\Controllers\IncomingMailExportController;

// home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Daftar artikel
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Artikel tunggal berdasarkan slug
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
// Ganti route authors.posts dengan yang sesuai
// Tambahkan route ini bersama route lainnya
Route::get('/authors/{username}/posts', [ArticleController::class, 'postsByAuthor'])->name('authors.posts');
Route::get('/categories/{slug}', [ArticleController::class, 'postsByCategory'])->name('categories.show');










// Lyrics
Route::get('/lyrics', [SongsController::class, 'index'])->name('songs.index');

// Lirik tunggal berdasarkan slug
Route::get('/lyrics/{slug}', [SongsController::class, 'show'])->name('songs.show');

Route::get('/authors/{username}/songs', [SongsController::class, 'postsByAuthor'])->name('authors.songs');
Route::get('categories-songs/{slug}', [CategorySongController::class, 'show'])->name('categories-songs.show');












// about
Route::get('/about', function () {
    return view('about');
});

// Schedule
Route::get('/schedule', function () {
    return view('schedule.index');
});

// export-pdf for incoming_mail and outcoming_mail

