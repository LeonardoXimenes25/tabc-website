@extends('layouts.app')

@section('title', 'Artikel | TABCTL')

@section('content')
<div class="container my-4" style="min-height: 100vh;">

    {{-- header --}}
    <div class="row bg-light rounded-3 p-3 shadow-sm">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/home"  class="text-decoration-none d-flex align-items-center">
                            <i class="fas fa-home me-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4">
            <form class="d-flex" action="{{ route('articles.search') }}" method="GET">
                <input 
                    class="form-control form-control-sm shadow-sm" 
                    type="search" 
                    name="query" 
                    placeholder="Cari artikel..." 
                    aria-label="Search"
                    value="{{ request()->query('query') }}"
                    oninput="this.form.submit()" 
                >
            </form>
        </div>
    </div>
    {{-- end header --}}

    <!-- Judul Artikel Terbaru dan Lihat Semua -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h2 class="fw-bold">Artikel Terbaru</h2>
        <a href="#" class="btn btn-link text-primary">Lihat Semua</a>
    </div>


    {{-- article strat --}}
    {{-- artikel section start --}}
@if ($posts->count() > 0)
@foreach ($posts->chunk(4) as $chunk)
    <div class="row">
        @foreach ($chunk as $post)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <!-- Featured Image -->
                    <img src="{{ asset($post->image_url) }}" class="card-img-top" alt="{{ $post->title }}">

                    <div class="card-body">
                        <!-- Artikel Title sebagai Link -->
                        <a href="{{ route('articles.show', $post->slug) }}" class="text-decoration-none text-dark" style="font-size: 1rem">
                            {{ $post->title }}
                        </a>

                        {{-- Author and Date --}}
                        <div class="author mb-1 text-muted" style="font-size: 0.7rem">
                            <a href="#" class="text-muted">{{ $post->author->name }} | {{$post->created_at->diffForHumans()}}</a>
                        </div>

                        <!-- Artikel Excerpt -->
                        <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                            {{ Str::limit($post->body, 100) }}
                        </p>

                        <!-- Read More Link -->
                        <a href="{{ route('articles.show', $post->slug) }}" style="font-size: 0.7rem">
                            Read More &gt;&gt;
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

{{-- Pagination --}}
<div class="mt-4">
    {{ $posts->links('pagination::bootstrap-5') }}
</div>
@else
{{-- Tampilkan Pesan Kosong --}}
<div class="alert alert-warning text-center" role="alert">
    Belum ada artikel yang tersedia.
</div>
@endif
{{-- artikel section end --}}



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

