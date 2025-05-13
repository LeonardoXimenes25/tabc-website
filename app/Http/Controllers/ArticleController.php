<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel dengan pagination.
     */
    public function index()
    {
        // Ambil data artikel dengan relasi author dan category
        $posts = Article::with(['author', 'category'])->latest()->paginate(8);
        return view('articles.posts', compact('posts', 'posts'));
    }

    public function show($slug)
    {
        $post = Article::with(['author', 'category', 'comment.user'])->where('slug', $slug)->firstOrFail();

        // Ambil artikel terkait berdasarkan kategori
        $relatedPosts = Article::where('id', '!=', $post->id)
                               ->latest()
                               ->take(4)
                               ->with(['author', 'category'])
                               ->get();

        return view('articles.show', compact('post', 'relatedPosts'));
    }



    public function postsByAuthor($username)
    {
        $author = User::where('username', $username)->firstOrFail();
        
        $posts = $author->articles()
                       ->with('category')
                       ->latest()
                       ->paginate(8);
        
        return view('articles.posts', [
            'title' => "Artikel oleh $author->name",
            'posts' => $posts,
        ]);
    }

    public function postsByCategory($slug)
    {
        // Ambil artikel-artikel berdasarkan kategori slug
        $posts = Article::whereHas('category', function($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->with('author', 'category')
        ->latest()
        ->paginate(10);

        return view('articles.posts', [
            'posts' => $posts
        ]);
    }

}
