<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    // Relasi ke user (penulis)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kategori (many-to-many)
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // Scope untuk artikel published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
