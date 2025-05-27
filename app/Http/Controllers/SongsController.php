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
                        ->with(['author', 'categorysong']) // eager load
                        ->get();

        return view('lyrics.show', compact('songs', 'relatedPosts'));
    }

      public function postsByArtist($artist)
    {
        $songs = Song::where('artist', $artist)
                     ->with('categorysong')
                     ->latest()
                     ->paginate(10);

        return view('lyrics.songs', [
            'title' => "Pujian oleh $artist",
            'songs' => $songs,
            'artist' => $artist
        ]);
    }

    public function postsByCategory($slug)
    {
        // Ambil artikel-artikel berdasarkan kategori slug
        $songs = Song::whereHas('categorysong', function($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->with('author', 'categorysong')
        ->latest()
        ->paginate(10);

        return view('lyrics.songs', [
            'songs' => $songs,
            'categorySlug' => $slug
        ]);
    }
}
