<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use App\Models\CategorySong;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        // Ambil data pujian/lagu dengan relasi author dan category
        $songs = Song::with(['author', 'categorysong'])->latest()->paginate(8);
        return view('lyrics.songs', compact('songs'));
    }

    // Menampilkan artikel berdasarkan slug
    public function show($slug)
    {
        // Eager load relasi author dan category
        $songs = Song::with(['author', 'categorysong'])->where('slug', $slug)->firstOrFail();

        $relatedPosts = Song::where('id', '!=', $songs->id)
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

    public function postsByCategory($slug)
    {
        // Cari kategori berdasarkan slug
        $categorysong = CategorySong::where('slug', $slug)->firstOrFail();

        // Ambil artikel-artikel yang masuk dalam kategori tersebut
        $songs = $categorysong->articles()->with('author')->latest()->paginate(10);

        return view('lyrics.songs', [
            'category' => $categorysong,
            'songs' => $songs
        ]);
    }
}
