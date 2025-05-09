<?php

namespace App\Models;

use Illuminate\Support\Str;
use Database\Seeders\ArticleSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'slug', 'body', 'image_url', 'category_id'];

    // eager lazy loading
    protected $with = ['author', 'category'];

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'article_id');
    }

    protected static function booted()
    {
        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
