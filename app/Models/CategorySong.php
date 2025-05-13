<?php

namespace App\Models;

use App\Models\Songs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorySong extends Model
{
    use HasFactory;

    public function songs() : HasMany {
        return $this->hasMany(Song::class, 'categorysong_id');
    }

    public function getCategoryColor()
    {
        switch ($this->name) {
            case 'Sekolah Minggu':
                return 'bg-success';
            case 'Natal':
                return 'bg-warning text-dark';
            case 'Paskua':
                return 'bg-danger';
            default:
                return 'bg-primary';
        }
    }
}
