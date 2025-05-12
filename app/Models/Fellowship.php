<?php

namespace App\Models;

use App\FellowshipType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fellowship extends Model
{
    /** @use HasFactory<\Database\Factories\FellowshipFactory> */
    use HasFactory;

    protected $fillable = [
        'date', 'fellowship_type', 'theme', 
        'bible_verse', 'preacher', 'mc', 'musician'
    ];

    protected $casts = [
        'date' => 'date'
    ];
}
