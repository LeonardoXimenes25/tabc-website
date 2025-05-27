<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'date',
        'type',           // income / expense
        'category',
        'amount',
        'description',
        'account',        // cash / bank
        'author_id',
        'financialreport_id'
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    // Relasi ke user (pembuat transaksi)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi ke laporan keuangan bulanan
    public function financialReport()
    {
        return $this->belongsTo(FinancialReport::class, 'financialreport_id');
    }
}
