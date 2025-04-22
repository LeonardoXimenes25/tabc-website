<?php

use App\Models\Article;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategorySongController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\IncomingMailExportController;

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// login auth
Route::middleware(['guest'])->group(function() {
    Route::get('/auth', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'login']);
});

// artikel route start
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/authors/{username}/posts', [ArticleController::class, 'postsByAuthor'])->name('authors.posts');
Route::get('/categories/{slug}', [ArticleController::class, 'postsByCategory'])->name('categories.show');
Route::post('/filament/comment-article', [ArticleCommentController::class, 'store'])->name('filament.comment-article.store');
// Daftar artikel route end

// lyrics route start
Route::get('/lyrics', [SongsController::class, 'index'])->name('songs.index');
Route::get('/lyrics/{slug}', [SongsController::class, 'show'])->name('songs.show');
Route::get('/authors/{username}/songs', [SongsController::class, 'postsByAuthor'])->name('authors.songs');
Route::get('categories-songs/{slug}', [CategorySongController::class, 'show'])->name('categories-songs.show');
// lyrics route end











// about
Route::get('/about', function () {
    return view('about');
});

// Schedule
Route::get('/schedule', function () {
    return view('schedule.index');
});

// export-pdf for incoming_mail and outcoming_mail

