<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleCommentController extends Controller
{
    /**
     * Simpan komentar utama untuk artikel.
     */
    public function store(Request $request, Article $article)
    {
        $this->validateComment($request);

        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Ita presija login atu komentariu.');
        }

        ArticleComment::create([
            'article_id' => $article->id,
            'author_id'  => Auth::id(),
            'body'       => $request->body,
            'parent_id'  => null, // komentar utama
        ]);

        return back()->with('success', 'Komentariu susesu aumenta.');
    }

    /**
     * Simpan balasan dari komentar tertentu.
     */
    public function reply(Request $request, Article $article, ArticleComment $comment)
    {
        $this->validateComment($request);

        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Ita presija login atu halo replay.');
        }

        ArticleComment::create([
            'article_id' => $article->id,
            'author_id'  => Auth::id(),
            'body'       => $request->body,
            'parent_id'  => $comment->id, // balasan ke komentar
        ]);

        return back()->with('success', 'Replay komentariu susesu.');
    }

    /**
     * Validasi isi komentar.
     */
    protected function validateComment(Request $request)
    {
        Validator::make($request->all(), [
            'body' => ['required', 'min:3'],
        ])->validate();
    }
}
