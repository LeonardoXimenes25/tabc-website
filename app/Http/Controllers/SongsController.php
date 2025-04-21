<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Songs;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        // Ambil data pujian/lagu dengan relasi author dan category
        $songs = Songs::with(['author', 'categorysong'])->latest()->paginate(8);
        return view('lyrics.songs', compact('songs'));
    }

    // Menampilkan artikel berdasarkan slug
    public function show($slug)
    {
        // Eager load relasi author dan category
        $songs = Songs::with(['author', 'categorysong'])->where('slug', $slug)->firstOrFail();

        $relatedPosts = Songs::where('id', '!=', $songs->id)
                        ->latest()
                        ->take(4)
                        ->with(['author', 'categorysong']) // Tambah ini biar related posts tidak N+1
                        ->get();

        return view('lyrics.show', compact('songs', 'relatedPosts'));
    }

    public function postsByAuthor($username)
    {
        $author = User::where('username', $username)->firstOrFail();
        
        $songs = $author->songs()
                       ->with('categorysong')
                       ->latest()
                       ->paginate(10);
        
        return view('lyrics.songs', [
            'title' => "Pujian oleh $author->name",
            'songs' => $songs,
        ]);
    }
}
