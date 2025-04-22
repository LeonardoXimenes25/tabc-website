<?php

namespace App\Models;

use Database\Seeders\ArticleSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body', 'image_url'];

    // eager lazy loading
    protected $with = ['author', 'category'];

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'article_id');
    }
}
