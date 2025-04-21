<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CategorySongs;

class CategorySongController extends Controller
{
    public function show($slug)
{
    $categorysong = CategorySongs::where('slug', $slug)->firstOrFail();

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
