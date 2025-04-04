<?php

use Illuminate\Support\Facades\Route;
// artikel
// Home
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
