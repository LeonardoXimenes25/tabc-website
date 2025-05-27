<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    const STATUS_DRAFT = 'draft';
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_APPROVED = 'approved';

    protected $fillable = [
        'month',
        'year',
        'total_income',
        'total_expense',
        'final_balance',
        'status',
        'author_id',
        'approved_by',
        'approved_at',
    ];

    protected $dates = ['approved_at'];

    public function getDisplayNameAttribute()
    {
        return $this->month . ' ' . $this->year;
    }

    // Relasi ke author (pembuat laporan)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi ke user yang menyetujui laporan
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Relasi ke transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
