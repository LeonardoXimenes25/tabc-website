<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function articles()
    {
    return $this->hasMany(Article::class, 'category_id');
    }

    public function getCategoryColor()
    {
        switch ($this->name) {
            case 'Renungan Harian':
                return 'bg-success';
            case 'Pengajaran Alkitab':
                return 'bg-warning text-dark';
            case 'Sejarah Gereja dan Tokoh Iman':
                return 'bg-danger';
            default:
                return 'bg-primary';
        }
    }
}
