<?php

namespace App\Models;

use App\WorshipType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worship extends Model
{
    /** @use HasFactory<\Database\Factories\WorshipFactory> */
    use HasFactory;
    
    protected $fillable = [
        'date', 'author_id', 'worship_type', 'theme', 'bible_verse', 
        'preacher', 'liturgist', 'singer', 'musician', 
        'greeter', 'collector', 'offering_prayer', 'lcd_operator'
    ];

    protected $casts = [
        'date' => 'date'
    ];
}
