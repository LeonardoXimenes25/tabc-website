<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'slug',
        'body',
        'image_url',
        'category_id'
    ];

    // Auto load relasi untuk efisiensi query
    protected $with = ['author', 'category'];

    /**
     * Relasi ke penulis artikel
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relasi ke kategori artikel
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relasi ke komentar artikel (hanya komentar level atas / semua komentar jika ingin)
     */
    public function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'article_id');
    }

    /**
     * Auto-generate slug jika belum ada
     */
    protected static function booted()
    {
        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
