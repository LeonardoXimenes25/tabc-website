<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Songs extends Model
{
    /** @use HasFactory<\Database\Factories\SongsFactory> */
    use HasFactory;

    protected $fillable = ['title', 'author', 'slug', 'body', 'image_url'];

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function categorysong(): BelongsTo 
    {
        return $this->belongsTo(CategorySongs::class, 'category_id');
    }
}
