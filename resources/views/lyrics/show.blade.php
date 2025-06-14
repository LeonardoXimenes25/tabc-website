@extends('layouts.app')

@section('content')
<div class="container my-4" style="min-height: 100vh">

    {{-- Header --}}
    <div class="row mb-4 bg-light rounded-3 p-3 shadow-sm">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none d-flex align-items-center">
                            <i class="fas fa-home me-2"></i>
                            Baranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('songs.index') }}" class="text-decoration-none">
                            Letra Musika
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Str::limit($songs->title, 30) }}
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4">
            <form class="d-flex">
                <input class="form-control form-control-sm shadow-sm" type="search" placeholder="Cari lagu..." aria-label="Search">
            </form>
        </div>
    </div>
    {{-- End Header --}}

    <div class="row">
        <!-- Column 1: Song Info -->
        <div class="col-lg-3 pe-lg-4 mb-4">
            <div class="song-info">
                <div class="d-flex align-items-center mb-2">
                    <h6 class="me-2 fw-bold">Artista:</h6>
                    <h6 class="text-muted">{{ $songs->artist }}</h6>
                </div>
                <div class="d-flex mb-2">
                    <h6 class="me-2 fw-bold">Tema:</h6>
                    <h6 class="text-muted">{{ $songs->categorysong->name }}</h6>
                </div>
                <div class="d-flex mb-2">
                    <h6 class="me-2 fw-bold">Album:</h6>
                    <h6 class="text-muted">{{ $songs->album }}</h6>
                </div>
                <div class="d-flex mb-2">
                  <h6 class="me-2 fw-bold">Tinan Release:</h6>
                  <h6 class="text-muted">{{ $songs->year }}</h6>
              </div>

                {{-- Tags --}}
                <div class="tags mt-3">
                    <span class="badge bg-primary me-1 mb-1">JPCC</span>
                    <span class="badge bg-primary me-1 mb-1">Worship</span>
                </div>

                {{-- YouTube Embed --}}
                @if ($songs->youtube_embed)
                      @php
                          preg_match('/v=([^&]+)/', $songs->youtube_embed, $matches);
                          $videoId = $matches[1] ?? null;
                      @endphp

                      @if ($videoId)
                          <div class="mt-4 d-flex justify-content-center">
                              <div class="ratio ratio-16x9" style="max-width: 100%; width: 100%; height: auto;">
                                  <iframe 
                                      src="https://www.youtube.com/embed/{{ $videoId }}" 
                                      frameborder="0" 
                                      allowfullscreen>
                                  </iframe>
                              </div>
                          </div>
                      @endif
                  @endif
                {{-- End YouTube Embed --}}
            </div>
        </div>
        <!-- End Column 1 -->

        <!-- Column 2: Lyrics -->
        <div class="col-lg-5 px-lg-4 mb-4">
            <article class="lyrics-content">
                <h1 class="display-6 mb-4 fw-bold">{{ $songs->title }}</h1>
                <div class="lyrics-body">
                    {!! $songs->body !!}
                </div>
            </article>
        </div>
        <!-- End Column 2 -->

        <!-- Column 3: Sidebar -->
        <div class="col-lg-4 mb-4">
            @include('partials.sidebar', [
                'title' => 'Lagu Terbaru',
                'items' => \App\Models\Song::latest()->take(4)->get(),
                'route' => 'songs.show',
                'icon' => 'fas fa-music'
            ])
        </div>
        <!-- End Column 3 -->

    </div> <!-- End Row -->
</div>
@endsection

{{-- Styles --}}
@push('styles')
<style>
    .youtube-embed {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }
    .youtube-embed iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
@endpush
