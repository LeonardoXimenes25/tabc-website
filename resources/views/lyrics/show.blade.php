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
            <input class="form-control form-control-sm shadow-sm" type="search" placeholder="Cari artikel..." aria-label="Search">
        </form>
    </div>
</div>
{{-- end header --}}


  <div class="row">
    <!-- Column 1: Song Info (Tighter spacing) -->
    <div class="col-lg-3 pe-lg-4">
      <div class="song-info">
        <div class="d-flex align-items-center mb-2">
          <h6 class="text me-2 fw-bold">Artist:</h6>
          <h6 class="text-muted">{{$songs->artist}}</h6>
        </div>
        
        <div class="d-flex mb-2">
          <h6 class="text me-2 fw-bold">Genre:</h6>
          <h6 class="text-muted">{{$songs->categorysong->name}}</h6>
        </div>
        
        <div class="d-flex mb-2">
          <h6 class="text me-2 fw-bold">Album:</h6>
          <h6 class="text-muted">{{$songs->album}}</h6>
        </div>
        
        
        <div class="tags mt-3">
          <span class="badge bg-primary me-1 mb-1">JPCC</span>
          <span class="badge bg-primary me-1 mb-1">Worship</span>
        </div>
      </div>
      
      <!-- Smaller YouTube Embed -->
      <div class="mt-3" style="max-width: 280px;">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                  frameborder="0" 
                  allowfullscreen></iframe>
        </div>
      </div>
    </div>
    
    <!-- Column 2: Lyrics (Tighter line height) -->
    <div class="col-lg-5 px-lg-4">
      <article class="lyrics-content">
        <h1 class="display-6 mb-4 fw">Made Alive</h1>
        
        <!-- Verse 1 -->
        <div class="lyrics-section mb-3">
          <h6 class="text-muted mb-2">Verse 1</h6>
          <p>Ku dib'ri hidup yang kekal</p>
          <p>Ku dipanggil anak Tuhan</p>
          <p>Di dalam Dia ku berdiri</p>
          <p>Kudus dan tak bercacat</p>
        </div>
        
        <!-- Chorus -->
        <div class="lyrics-section mb-3">
          <h6 class="text-muted mb-2">Chorus</h6>
          <p>Ku dibuat hidup dalam Kristus</p>
          <p>Ku dib'ri hati yang baru</p>
          <p>Ku dipanggil untuk bersinar</p>
          <p>Menyatakan kemuliaan-Nya</p>
        </div>
      </article>
    </div>

    <div class="col-lg-4">
          {{-- sidebar --}}
    @include('partials.sidebar', [
      'title' => 'Lagu Terbaru',
      'items' => \App\Models\Song::latest()->take(4)->get(),
      'route' => 'songs.show',
      'icon' => 'fas fa-music'
  ])
  
    {{-- end sidebar --}}
    </div>
</div>
@endsection