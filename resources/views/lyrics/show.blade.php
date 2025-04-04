@extends('layouts.app')

@section('content')
<div class="container my-4 pt-5">
  <div class="row">
    <!-- Column 1: Song Info (Tighter spacing) -->
    <div class="col-lg-3 pe-lg-4">
      <div class="song-info">
        <div class="d-flex align-items-center mb-2">
          <h6 class="text me-2 fw-bold">Artist:</h6>
          <h6 class="text-muted">JPCC Worship</h6>
        </div>
        
        <div class="d-flex mb-2">
          <h6 class="text me-2 fw-bold">Genre:</h6>
          <h6 class="text-muted">Modern Worship</h6>
        </div>
        
        <div class="d-flex mb-2">
          <h6 class="text me-2 fw-bold">Album:</h6>
          <h6 class="text-muted">Made Alive</h6>
        </div>
        
        <div class="d-flex mb-2">
          <h6 class="text me-2 fw-bold">Year:</h6>
          <h6 class="text-muted">2017</h6>
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
    
    <!-- Column 3: Related Songs Only (No Popular Lyrics) -->
    <div class="col-lg-4 ps-lg-3">
      <div class="sticky-top" style="top: 15px;">
        <h3 class="h5 mb-2 pb-2 border-bottom">Lagu Terkait</h3>
        
        <!-- Clickable Text Items -->
        <a href="#" class="related-song-item d-block mb-2 p-2 text-decoration-none">
          <h5 class="mb-0 text-light">All Heaven Declares</h5>
          <p class="text-light small mb-0">JPCC Worship • 2015</p>
        </a>
        
        <a href="#" class="related-song-item d-block mb-2 p-2 text-decoration-none">
          <h5 class="mb-0 text-light">God of Victory</h5>
          <p class="text-light small mb-0">JPCC Worship • 2019</p>
        </a>
        
        <a href="#" class="related-song-item d-block mb-2 p-2 text-decoration-none">
          <h5 class="mb-0 text-light">Percaya</h5>
          <p class="text-light small mb-0">JPCC Worship • 2016</p>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection