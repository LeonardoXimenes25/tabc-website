<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutcomingMail extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'outcoming_mails';

    // The attributes that are mass assignable.
    protected $fillable = [
        'sent_date',
        'author_id',
        'letter_number',
        'recipient',
        'subject',
        'attachment',
        'responsible_person',
        'status',
        'rejection_note',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'sent_date' => 'date',
    ];

    // Status options
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_IN_PROGRESS = 'in progress';
    const STATUS_PEDNING = 'pending';
    
    // relasi with author table
    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
