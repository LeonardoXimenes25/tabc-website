<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Worship;
use App\Models\Fellowship;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // Ambil bulan dan tahun saat ini atau dari parameter request
        $currentMonth = $request->get('month', Carbon::now()->month);
        $currentYear = $request->get('year', Carbon::now()->year);

        // Validasi bulan dan tahun (misalnya pastikan bulan antara 1 dan 12)
        if ($currentMonth < 1 || $currentMonth > 12) {
            $currentMonth = Carbon::now()->month; // Set ke bulan saat ini jika tidak valid
        }

        if ($currentYear < 1900 || $currentYear > Carbon::now()->year) {
            $currentYear = Carbon::now()->year; // Set ke tahun saat ini jika tidak valid
        }

        // Ambil acara dari model Worship dan Fellowship berdasarkan bulan dan tahun
        $worshipEvents = Worship::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->orderBy('date')
            ->get();

        $fellowshipEvents = Fellowship::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->orderBy('date')
            ->get();

        // Gabungkan kedua jenis acara dalam array
        $events = $worshipEvents->merge($fellowshipEvents)->sortBy('date');

        // Mengirim data ke view
        return view('schedules.index', [
            'events' => $events,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear
        ]);
    }

        public function show($type, $id)
    {
        if ($type === 'worship') {
            $event = Worship::findOrFail($id);
        } elseif ($type === 'fellowship') {
            $event = Fellowship::findOrFail($id);
        } else {
            abort(404, 'Tipe event tidak ditemukan.');
        }

        return view('schedules.show', compact('event', 'type'));
    }

    
}
