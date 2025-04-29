<?php

namespace App\Http\Controllers;
use App\Models\CategorySong;
use Illuminate\Http\Request;

class CategorySongController extends Controller
{
    public function show($slug)
{
    $categorysong = CategorySong::where('slug', $slug)->firstOrFail();

    $songs = $categorysong->songs()
        ->with(['author', 'categorysong']) // eager load relasi
        ->latest()
        ->paginate(10);

    return view('lyrics.songs', [
        'title' => "Posts in Category: $categorysong->name",
        'songs' => $songs
    ]);
}

}
