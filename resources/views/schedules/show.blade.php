@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">{{ $schedule->theme }}</h1>
    <div class="card shadow-sm">
        <div class="card-header bg-light fw-bold">Detail Jadwal</div>
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</p>
            <p><strong>Kategori:</strong> {{ $schedule->category }}</p>
            <p><strong>Tempat:</strong> {{ $schedule->location }}</p>
            <p><strong>Pengkhotbah:</strong> {{ $schedule->preacher }}</p>
            <p><strong>Liturgis:</strong> {{ $schedule->liturgist }}</p>
            <p><strong>Informasi:</strong> {{ $schedule->info }}</p>
        </div>
    </div>
</div>
@endsection
