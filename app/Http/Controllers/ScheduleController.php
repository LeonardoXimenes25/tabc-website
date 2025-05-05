<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all(); // Mengambil semua jadwal
        return view('schedules.index', compact('schedules'));
    }

    // Menampilkan detail dari sebuah jadwal berdasarkan ID
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id); // Mencari jadwal berdasarkan ID
        return view('schedules.show', compact('schedule'));
    }

    // Menampilkan halaman kalender jadwal
    public function calendar()
    {
        $schedules = Schedule::all(); // Mengambil semua jadwal
        return view('schedules.calendar', compact('schedules'));
    }
}
