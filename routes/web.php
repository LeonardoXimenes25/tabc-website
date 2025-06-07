<?php

use App\Models\FinancialReport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CategorySongController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\FinancialReportPrintController;

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// artikel route start
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
// Change this route
Route::get('/authors/{username}/posts', function($username) {
    return view('articles.posts', ['authorUsername' => $username]);
})->name('authors.posts');
Route::get('/category/{slug}', function($slug){
    return view('articles.posts', ['categorySlug' => $slug]);
})->name('categories.show');
Route::post('/articles/{article:slug}/comments', [ArticleCommentController::class, 'store'])->name('articles.comments.store');
// Daftar artikel route end

// lyrics route start
Route::get('/lyrics', [SongsController::class, 'index'])->name('songs.index');
Route::get('/lyrics/{slug}', [SongsController::class, 'show'])->name('songs.show');
Route::get('/artist/{artist}', [SongsController::class, 'postsByArtist'])->name('songs.byArtist');
Route::get('categories-songs/{slug}', [SongsController::class, 'postsByCategory'])->name('categories-songs.show');

// lyrics route end

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/{type}/{id}', [ScheduleController::class, 'show'])->name('schedules.show');

// Gallery
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{gallery}', [GalleryController::class, 'show'])->name('galleries.show');

// about
Route::get('/about', function () {
    return view('about');
});


// auth
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// laporan keuangan
Route::get('/report/{report}/print', [FinancialReportPrintController::class, 'print'])
    ->name('report.print');