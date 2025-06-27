<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('images')->latest()->paginate(8);
        return view('galleries.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        // Ambil 24 gambar max per page
        $images = $gallery->images()->paginate(8);
        return view('galleries.show', compact('gallery', 'images'));
    }
}
