<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'date', 'category', 'theme', 'bible_verse',
        'preacher', 'liturgist', 'singer', 'musician',
        'greeter', 'offering_collector', 'offering_prayer',
        'lcd_operator', 'mc'
    ];

    protected $casts = [
        'date' => 'date'
    ];

}
