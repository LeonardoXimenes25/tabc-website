<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'slug', 'body', 'image_url', 'categorysong_id', 'artist', 'album', 'youtube_embed'];

    // Eager loading untuk relasi 'author' dan 'categorysong'
    protected $with = ['author', 'categorysong'];

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categorysong(): BelongsTo {
        return $this->belongsTo(CategorySong::class, 'author_id');
    }
}
