<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        $posts = Article::latest()->paginate(8);  // Menampilkan 8 artikel per halaman
        return view('articles.posts', compact('posts'));
    }

    // Menampilkan artikel berdasarkan slug
    public function show($slug)
    {
        $post = Article::where('slug', $slug)->firstOrFail();
        $relatedPosts = Article::where('id', '!=', $post->id)
                        ->latest()
                        ->take(4)
                        ->get();

        return view('articles.show', compact('post', 'relatedPosts'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $posts = Article::where('title', 'like', "%{$query}%")
                        ->orWhere('body', 'like', "%{$query}%")
                        ->paginate(10);

        return view('articles.posts', compact('posts'));
    }
}
