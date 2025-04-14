<?php

use App\Models\Post;
use App\Models\Article;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IncomingMailExportController;

// home
Route::get('/', function () {
    return view('home');
});

// daftar artikel
Route::get('/articles', function () {
    $posts = Article::latest()->paginate(8); // 8 artikel per halaman
    return view('articles.posts', ['posts' => $posts]);
});

// single post
Route::get('/articles/{article:slug}', function (Article $post) {
    return view('articles.show', ['post' => $post]);
});



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

