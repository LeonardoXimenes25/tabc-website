<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        // Ambil data artikel dengan relasi author dan category
        $posts = Article::with(['author', 'category'])->latest()->paginate(8);
        
        // Kalau masih butuh authors count (bisa disesuaikan)
        $authors = User::withCount('articles')->get();

        return view('articles.posts', compact('posts'));
    }

    // Menampilkan artikel berdasarkan slug
    public function show($slug)
    {
        // Eager load relasi author dan category
        $post = Article::with(['author', 'category'])->where('slug', $slug)->firstOrFail();

        $relatedPosts = Article::where('id', '!=', $post->id)
                        ->latest()
                        ->take(4)
                        ->with(['author', 'category']) // Tambah ini biar related posts tidak N+1
                        ->get();

        $categoryArticleCount = $post->category->articles()->count();

        return view('articles.show', compact('post', 'relatedPosts'));
    }



    // Menampilkan artikel berdasarkan username penulis
    public function postsByAuthor($username)
    {
        $author = User::where('username', $username)->firstOrFail();

        // Eager load category jika dipakai di view
        $posts = $author->articles()
        ->with(['author', 'category']) // eager load relasi
        ->latest()
        ->paginate(10);


        $articleCount = $author->articles()->count();

        return view('articles.posts', [
            'title' => "All posts by $author->name",
            'posts' => $posts,
            'articleCount' => $articleCount
        ]);
    }
}
