@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">{{ $gallery->title }}</h2>
    
    <p class="text-muted">
        {{-- Mengecek apakah event_date ada dan merupakan objek Carbon --}}
        @if ($gallery->event_date && $gallery->event_date instanceof \Carbon\Carbon)
            Data: {{ $gallery->event_date->format('d M Y') }}
        @else
            <span class="text-danger">Data Seidauk Iha</span>
        @endif
    </p>

    <p>{{ $gallery->description }}</p>

    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Gallery Image">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
