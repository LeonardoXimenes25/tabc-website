<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;

class ArticleCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:posts,id',
            'body' => 'required|string|max:1000',
        ]);

        ArticleComment::create([
            'user_id' => Auth::id(),
            'article_id' => $request->post_id,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim!');
    }
}
