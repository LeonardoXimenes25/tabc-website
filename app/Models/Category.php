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
                return 'success';
            case 'Historia biblia':
                return 'warning';
            case 'Historia igreja no figura fe':
                return 'danger';
            default:
                return 'primary';
        }
    }
}
