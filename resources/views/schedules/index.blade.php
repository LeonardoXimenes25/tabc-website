@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Daftar Jadwal Ibadah</h1>
            <p class="text-muted mb-0">Berikut adalah jadwal-jadwal ibadah yang telah ditentukan.</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('schedule.calendar') }}" class="btn btn-sm btn-outline-primary">
                <i class="far fa-calendar-alt me-1"></i> Kalender
            </a>
            <button class="btn btn-sm btn-outline-primary active">
                <i class="fas fa-list me-1"></i> Daftar
            </button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-light fw-bold">Jadwal Terbaru</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Tema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</td>
                        <td>{{ $schedule->category }}</td>
                        <td>{{ $schedule->theme }}</td>
                        <td>
                            <a href="{{ route('schedule.show', $schedule->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
