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
        return view('articles.posts', compact('posts'));
    }

    public function show($slug)
    {
    $post = Article::with([
        'author', 
        'category', 
        'comments' => function ($query) {
                $query->whereNull('parent_id')
                ->with(['user', 'replies' => function($q) {
                $q->with('user')->orderBy('created_at')->limit(5);
            }]);
}
    ])->where('slug', $slug)->firstOrFail();

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
