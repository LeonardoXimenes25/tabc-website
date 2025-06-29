<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'author_id',
        'body',
        'parent_id'
    ];

     // Auto load relasi untuk efisiensi query
    protected $with = ['replies'];

    /**
     * Relasi ke artikel
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    /**
     * Relasi ke pengguna yang memberikan komentar
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relasi ke komentar induk
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ArticleComment::class, 'parent_id');
    }

    /**
     * Relasi ke balasan komentar ini
     */
    public function replies()
    {
        return $this->hasMany(ArticleComment::class, 'parent_id')->orderBy('created_at');
    }

}
