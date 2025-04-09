<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomingMail extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'incoming_mails';

    // The attributes that are mass assignable.
    protected $fillable = [
        'letter_number',
        'received_date',
        'sender',
        'subject',
        'attachment',
        'receiver',
        'status',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'received_date' => 'date',
    ];

    // Status options
    const STATUS_RECEIVED = 'received';
    const STATUS_DRAFT = 'draft';
}
