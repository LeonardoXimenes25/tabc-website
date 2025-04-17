<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body', 'image_url'];

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
