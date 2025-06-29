<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'article_id', 'parent_id', 'body'];

    // Relasi ke user/author
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi ke article
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    // Relasi ke parent comment (jika balasan)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ArticleComment::class, 'parent_id');
    }

    // Relasi ke replies (komentar yang membalas comment ini)
    public function replies(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'parent_id');
    }
}
