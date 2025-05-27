<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Songs;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'position',
        'section',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function articles(): HasMany {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function songs(): HasMany {
        return $this->hasMany(Song::class, 'author_id');
    }

    public function articlecomment(): HasMany {
        return $this->hasMany(ArticleComment::class, 'author_id');
    }

    public function gallery(): HasMany {
        return $this->hasMany(Gallery::class, 'author_id');
    }

    public function incomingmail(): HasMany {
        return $this->hasMany(IncomingMail::class, 'author_id');
    }

    public function outcomingmail(): HasMany {
        return $this->hasMany(OutcomingMail::class, 'author_id');
    }

    public function worships(): HasMany {
        return $this->hasMany(worship::class, 'author_id');
    }

    public function fellowships(): HasMany {
        return $this->hasMany(fellowship::class, 'author_id');
    }

    public function transactions()
    {
    return $this->hasMany(Transaction::class, 'author_id');
    }

    public function financialReports()
    {
        return $this->hasMany(FinancialReport::class, 'author_id');
    }

    public function approvedFinancialReports()
    {
        return $this->hasMany(FinancialReport::class, 'approved_by');
    }

}