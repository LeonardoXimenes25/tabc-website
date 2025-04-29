<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleCommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        // Validasi data komentar
        $validator = Validator::make($request->all(), [
            'body' => 'required|min:3', // Contoh validasi: komentar minimal 3 karakter
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Pastikan user sudah login untuk bisa berkomentar
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda harus login untuk berkomentar.');
        }

        // Buat komentar baru dan kaitkan dengan artikel dan user yang sedang login
        $comment = new ArticleComment();
        $comment->article_id = $article->id;
        $comment->author_id = Auth::id();
        $comment->body = $request->body;
        $comment->save();

        // Redirect kembali ke halaman artikel dengan pesan sukses
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
