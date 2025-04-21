@extends('layouts.app')

@section('title', 'Artikel | TABCTL')

@section('content')
<div class="container my-4" style="min-height: 100vh;">

    {{-- header --}}
    <div class="row bg-light rounded-3 p-3 shadow-sm align-items-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/home" class="text-decoration-none d-flex align-items-center">
                            <i class="fas fa-home me-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('articles.index') }}">Artikel</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4">
            <input 
                type="text" 
                wire:model.debounce.300ms="query" 
                class="form-control form-control-sm" 
                placeholder="Cari artikel...">
        </div>
    </div>
    {{-- end header --}}

    {{-- Artikel --}}
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h4 class="fw-bold">Artikel Terbaru</h4>
    </div>
    
    {{-- article start --}}
    @if ($posts->count() > 0)
        @foreach ($posts->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm transition-card">
                            <img src="{{ asset($post->image_url) }}" class="card-img-top" alt="{{ $post->title }}" >
                            <div class="card-body">
                                <a href="{{ route('articles.show', $post->slug) }}" class="text-decoration-none text-dark" style="font-size: 1rem">
                                    {{ $post->title }}
                                </a>
                                {{-- author, categories and date --}}
                                <div class="d-flex flex-wrap align-items-center mb-4 text-muted small my-2" style="font-size: 0.7rem">
                                    <span class="me-2">✍️ By 
                                        <a href="{{ route('authors.posts', $post->author->username) }}" class="text-decoration-none text-muted fw-semibold">
                                            {{ $post->author->name }}
                                        </a>
                                    </span>
                                    <span class="me-2">
                                        <a href="{{ route('categories.show', $post->category->slug) }}" class="text-decoration-none">
                                            <span class="badge bg-primary text-white px-3 py-1 rounded-pill">{{ $post->category->name }}</span>
                                        </a>
                                    </span>
                                    <span class="me-2">🕒 {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                {{-- author, categories and date end--}}

                                <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                                    {{ Str::limit($post->body, 100) }}
                                </p>
                                <a href="{{ route('articles.show', $post->slug) }}" style="font-size: 0.7rem">
                                    Read More &gt;&gt;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="alert alert-warning text-center" role="alert">
            Belum ada artikel yang tersedia.
        </div>
    @endif
    {{-- artikel section end --}}
    
    {{-- Pagination --}}
    <div class="mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

    <style>
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
</div>
@endsection
