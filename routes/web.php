<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingMailExportController;
// home
Route::get('/', function () {
    return view('home');
});

// Daftar Artikel
Route::get('/articles', function () {
    return view('articles.index');
});

// Single Post
Route::get('/articles/{id}', function ($id) {
    return view('articles.show');
});

// lirik lagu
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
Route::get('/admin/incoming-mails/{record}/preview', [IncomingMailExportController::class, 'preview'])
    ->name('filament.admin.incoming-mails.preview');