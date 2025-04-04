<?php

use Illuminate\Support\Facades\Route;

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
