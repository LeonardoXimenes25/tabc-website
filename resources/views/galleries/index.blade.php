@extends('layouts.app')

@section('content')
<style>
    .gallery-cover {
        aspect-ratio: 4 / 3;
        overflow: hidden;
        border-top-left-radius: .5rem;
        border-top-right-radius: .5rem;
    }

    .gallery-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>

<div class="container my-5" style="min-height: 100vh">
    <h2 class="mb-4 fw-bold">Galeri Foto</h2>

    <div class="row">
        @foreach ($galleries as $gallery)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100">
                @php
                    $cover = $gallery->images->first();
                @endphp

                <div class="gallery-cover">
                    @if ($cover)
                        <img src="{{ asset('storage/' . $cover->image_path) }}" alt="{{ $gallery->title }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="No Image"> {{-- fallback --}}
                    @endif
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <p class="card-text text-muted">
                        @if ($gallery->event_date && $gallery->event_date instanceof \Carbon\Carbon)
                            {{ $gallery->event_date->format('d M Y') }}
                        @else
                            <span class="text-danger">Data seidauk iha</span>
                        @endif
                    </p>
                    <a href="{{ route('galleries.show', $gallery) }}" class="btn btn-sm btn-outline-primary">Haree Imajen</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $galleries->links() }}
    </div>
</div>
@endsection
