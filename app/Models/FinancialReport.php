<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinancialReport extends Model
{
    use HasFactory;

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

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    /**
     * Akses nama tampilan, misalnya: "April 2024"
     */
    public function getDisplayNameAttribute()
    {
        return $this->month . ' ' . $this->year;
    }

    /**
     * Relasi ke user yang membuat laporan
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relasi ke user yang menyetujui laporan
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Relasi ke transaksi keuangan
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Hitung total pemasukan, pengeluaran, dan saldo akhir
     */
    public function calculateSummary()
    {
        $income = $this->transactions()->where('type', 'income')->sum('amount');
        $expense = $this->transactions()->where('type', 'expense')->sum('amount');

        $this->total_income = $income;
        $this->total_expense = $expense;
        $this->final_balance = $income - $expense;

        $this->save();
    }

    /**
     * Scope untuk mengambil laporan yang statusnya submitted
     */
    public function scopeSubmitted($query)
    {
        return $query->where('status', self::STATUS_SUBMITTED);
    }

    /**
     * Scope untuk mengambil laporan yang statusnya approved
     */
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    /**
     * Scope opsional: cari berdasarkan bulan & tahun
     */
    public function scopeForMonthYear($query, $monthName, $year)
    {
        return $query->where('month', $monthName)
                     ->where('year', $year);
    }
}
