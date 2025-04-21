@extends('layouts.app')

@section('title', 'Lirik-Lagu | TABCTL') 

@section('content')
<div class="container my-4" style="min-height: 100vh;">

      {{-- header --}}
      <div class="row bg-light rounded-3 p-3 shadow-sm">
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
                      <a href="{{ route('songs.index') }}">Pujian</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4">
            <form class="d-flex">
                <input class="form-control form-control-sm shadow-sm" type="search" placeholder="Cari Pujian..." aria-label="Search">
            </form>
        </div>
    </div>
    {{-- end header --}}


    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h2 class="fw-bold">Lirik Pujian Terbaru</h2>
    </div>

{{-- lirik lagu start --}}
@if ($songs->count() > 0)
@foreach ($songs->chunk(4) as $chunk)
    <div class="row">
        @foreach ($chunk as $song)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="{{ asset($song->image_url) }}" class="card-img-top" alt="{{ $song->title }}" >
                    <div class="card-body">
                        <a href="{{ route('songs.show', $song->slug) }}" class="text-decoration-none text-dark" style="font-size: 1rem">
                            {{ $song->title }}
                        </a>
                        <div class="author mb-1 text-muted" style="font-size: 0.6rem">
                            By <a href="{{ route('authors.songs', $song->author->username) }}" class="text-muted">{{ $song->author->name }}</a> 
                            {{ $song->author->articles_count }}
                            in 
                            <a href="{{ route('categories-songs.show', $song->categorysong->slug) }}" class="text-muted">{{ $song->categorysong->name }}</a> 
                            {{$song->created_at->diffForHumans()}}
                        </div>
                        <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                            {{ Str::limit($song->body, 50) }}
                        </p>
                        <a href="{{ route('songs.show', $song->slug) }}" style="font-size: 0.7rem">
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
    Belum ada Lirik lagu yang tersedia.
</div>
@endif
{{-- artikel section end --}}

{{-- Pagination --}}
<div class="mt-4">
{{ $songs->links('pagination::bootstrap-5') }}
</div>
{{-- lyrics lagu end --}}
  </div>
</div>
@endsection