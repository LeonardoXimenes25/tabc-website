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
            case 'Devosaun loro-loron':
                return 'bg-success';
            case 'Historia biblia':
                return 'bg-warning text-dark';
            case 'Historia igreja no figura fe':
                return 'bg-danger';
            default:
                return 'bg-primary';
        }
    }
}
