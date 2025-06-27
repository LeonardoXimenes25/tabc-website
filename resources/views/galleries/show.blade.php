@extends('layouts.app')

@section('content')
<style>
    .gallery-box {
        aspect-ratio: 4 / 3; /* Ganti 1 / 1 jika ingin square */
        overflow: hidden;
        border-radius: 8px;
    }

    .gallery-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>

<div class="container my-5">
    <h2 class="mb-4 fw-bold">{{ $gallery->title }}</h2>

    <p class="text-muted">
        @if ($gallery->event_date && $gallery->event_date instanceof \Carbon\Carbon)
            Data: {{ $gallery->event_date->format('d M Y') }}
        @else
            <span class="text-danger">Data Seidauk Iha</span>
        @endif
    </p>

    @if ($gallery->description)
        <p>{{ $gallery->description }}</p>
    @endif

    <div class="row row-cols-2 row-cols-md-4 g-4">
    @foreach ($images as $image)
        <div class="col">
            <div class="card h-100">
                <div class="gallery-box">
                    <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="gallery" data-title="{{ $gallery->title }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Image"
                            onerror="this.src='{{ asset('images/no-image.png') }}'">
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

    {{-- Pagination --}}
    @include('partials.pagination', ['paginator' => $images])

</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endsection
