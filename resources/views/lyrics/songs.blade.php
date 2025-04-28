@extends('layouts.app')

@section('title', 'Lirik-Lagu | TABCTL') 

@section('content')
<div class="container my-4" style="min-height: 100vh;">
    @php 
    $breadcrumbItems = [['title' => 'Lirik lagu', 'link' => route('songs.index'), 'active' => true]];
    @endphp

    @include('partials.breadcrumb_search', ['breadcrumbItems' => $breadcrumbItems])
    {{-- end header --}}

    {{-- end header --}}


    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h5 class="fw-bold">Lirik Pujian Terbaru</h5>
    </div>

{{-- lirik lagu start --}}
@if ($songs->count() > 0)
@foreach ($songs->chunk(4) as $chunk)
    <div class="row">
        @foreach ($chunk as $song)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="{{ asset('storage/' . $song->image_url) }}" class="card-img-top" alt="{{ $song->title }}" >
                    <div class="card-body">
                        <a href="{{ route('songs.show', $song->slug) }}" class="text-decoration-none text-dark fw-bold" style="font-size: 1rem">
                            {{ $song->title }}
                        </a>
                        {{-- author, genre and date --}}
                        <div class="d-flex flex-wrap align-items-center mb-4 text-muted small my-2"
                                    style="font-size: 0.7rem">
                                    <span class="me-2">✍️ By
                                        <a href="{{ route('authors.posts', $song->artist) }}"
                                            class="text-decoration-none text-muted fw-semibold">
                                            {{ $song->artist }}
                                        </a>
                                    </span>
                                    <span class="me-2">
                                        <a href="{{ route('categories.show', $song->categorysong->slug) }}" class="text-decoration-none">
                                            <span class="badge {{ $song->categorysong->getCategoryColor() }} text-white px-3 py-1 rounded-pill">
                                                {{ $song->categorysong->name }}
                                            </span>
                                        </a>
                                    </span>
                                    <span class="me-2">🕒 {{ $song->created_at->diffForHumans() }}</span>
                                </div>
                        {{-- end artist, genre and date --}}
                        <p class="mt-2 text-muted" style="font-size: 0.85rem;">
                            {!! Str::limit(strip_tags($song->body), 100) !!}
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

{{-- Panggil partial pagination --}}
@include('partials.pagination', ['paginator' => $songs])



  </div>
</div>
@endsection