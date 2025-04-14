@extends('layouts.app')

@section('title', 'Artikel | TABCTL')
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos magni, nam nihil delectus magnam ex iste id expedita neque, aliquam inventore commodi! Molestiae distinctio optio, voluptatem tempore doloribus beatae dolorem.
@section('content')
<div class="container my-4" style="min-height: 85vh;">

    @include('components.breadcumb')

    <!-- Judul Artikel Terbaru dan Lihat Semua -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h2 class="fw-bold">Artikel Terbaru</h2>
        <a href="#" class="btn btn-link text-primary">Lihat Semua</a>
    </div>

    {{-- artikel section start --}}
    @if ($posts->count() > 0)
        @foreach ($posts->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm transition-card">
                            <img src="{{ asset($post['image_url']) }}" class="card-img-top" alt="{{ $post['title'] }}">
                            <div class="card-body">
                                {{-- artikel title sebagai link --}}
                                <a href="{{ url('/articles/show/' . $post['slug']) }}" class="text-decoration-none text-dark" style="font-size: 1rem">
                                    {{ $post['title'] }}
                                </a>
                                {{-- author --}}
                                <div class="author mb-1 text-muted" style="font-size: 0.7rem">
                                    <a href="#" class="text-muted">{{ $post['author'] }}</a> | {{$post->created_at}}
                                </div>
                                <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                                    {{ Str::limit($post['body'], 100) }}
                                </p>
                                <!-- Read More -->
                                <a href="/articles/{{$post['slug']}}" style="font-size: 0.7rem">Read More &gt;&gt;</a>
                            </div>
                        </div>
                    </div>
             @endforeach
        </div>
    @endforeach

    {{-- Pagination muncul hanya jika data ada --}}
    <div class="mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div> @else
    {{-- Tampilkan pesan kosong --}}
    <div class="alert alert-warning text-center" role="alert">
            Belum ada artikel yang tersedia.
    </div>
    @endif
    {{-- post section end --}}


<style>
    /* Custom CSS untuk animasi dan hover */
    .transition-card {
        transition: all 0.3s ease;
    }
    
    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .transition-card:active {
        transform: translateY(0) scale(0.98);
    }
    
    .transition-btn {
        transition: all 0.2s ease;
    }
    
    .transition-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }
    
    .transition-btn:active {
        transform: translateY(0);
    }
</style>
@endsection

