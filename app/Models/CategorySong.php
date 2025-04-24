<?php

namespace App\Models;

use App\Models\Songs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorySong extends Model
{
    use HasFactory;

    public function song() : HasMany {
        return $this->hasMany(Song::class);
    }


}
