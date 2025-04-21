<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   // Menampilkan artikel berdasarkan kategori
   public function show($slug)
   {
       $category = Category::where('slug', $slug)->firstOrFail();
       $posts = $category->articles()
       ->with(['author', 'category']) // eager load relasi
       ->latest()
       ->paginate(10);

       return view('articles.posts', [
           'title' => "Posts in Category: $category->name",
           'posts' => $posts
       ]);
   }
}
