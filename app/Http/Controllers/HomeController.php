<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
{
    $posts = Article::with(['author', 'category'])
                       ->latest()
                       ->limit(4)
                       ->get();

    return view('home', compact('posts'));
}

}
