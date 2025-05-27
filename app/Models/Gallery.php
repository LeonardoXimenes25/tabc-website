<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = ['title', 'author_id', 'event_date', 'description'];

    protected $casts = [
    'event_date' => 'datetime',
    ];

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
