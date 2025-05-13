@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">Galeri Kegiatan</h2>
    <div class="row">
        @foreach ($galleries as $gallery)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <p class="card-text text-muted">
                        {{-- Mengecek apakah event_date ada dan merupakan objek Carbon --}}
                        @if ($gallery->event_date && $gallery->event_date instanceof \Carbon\Carbon)
                            {{ $gallery->event_date->format('d M Y') }}
                        @else
                            <span class="text-danger">Tanggal belum diatur</span>
                        @endif
                    </p>
                    <a href="{{ route('galleries.show', $gallery) }}" class="btn btn-sm btn-outline-primary">Lihat Foto</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $galleries->links() }}
    </div>
</div>
@endsection
