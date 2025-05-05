<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CategorySongController;
use App\Http\Controllers\ArticleCommentController;

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// artikel route start
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/authors/{username}/posts', [ArticleController::class, 'postsByAuthor'])->name('authors.posts');
Route::get('/categories/{slug}', [ArticleController::class, 'postsByCategory'])->name('categories.show');
Route::post('/articles/{article:slug}/comments', [ArticleCommentController::class, 'store'])->name('articles.comments.store');
// Daftar artikel route end

// lyrics route start
Route::get('/lyrics', [SongsController::class, 'index'])->name('songs.index');
Route::get('/lyrics/{slug}', [SongsController::class, 'show'])->name('songs.show');
Route::get('/authors/{username}/songs', [SongsController::class, 'postsByAuthor'])->name('authors.songs');
Route::get('categories-songs/{slug}', [CategorySongController::class, 'postsByCategory'])->name('categories-songs.show');
// lyrics route end

// about
Route::get('/about', function () {
    return view('about');
});

// schedule
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/calendar', [ScheduleController::class, 'calendar'])->name('schedule.calendar');
Route::get('/schedule/{id}', [ScheduleController::class, 'show'])->name('schedule.show');


// auth
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
