<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'event_date', 'description'];

    protected $casts = [
    'event_date' => 'datetime',
    ];


    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
