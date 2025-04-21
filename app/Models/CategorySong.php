<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorySong extends Model
{
    use HasFactory;

    public function songs(): HasMany 
    {
        return $this->hasMany(Songs::class);
    }
}
