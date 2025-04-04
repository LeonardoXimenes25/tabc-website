@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <article>
        <h1 class="display-4 mb-3">Judul Lagu - Penyanyi</h1>
        
        <div class="song-meta mb-4">
          <span class="badge bg-secondary me-2">Pop</span>
          <span class="badge bg-secondary me-2">2023</span>
          <span class="text-muted">3:45 menit</span>
        </div>
        
        <div class="lyrics-content">
          <p>[Verse 1]</p>
          <p>Ini adalah lirik lengkap dari lagu</p>
          <p>Baris pertama dari verse pertama</p>
          <p>Baris kedua dari verse pertama</p>
          
          <p class="mt-3">[Chorus]</p>
          <p>Bagian chorus yang catchy</p>
          <p>Diulang beberapa kali</p>
        </div>
        
        <div class="mt-5">
          <a href="/lyrics" class="btn btn-secondary">Kembali ke Daftar Lagu</a>
        </div>
      </article>
    </div>
    
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">
          Lagu Terkait
        </div>
        <div class="card-body">
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#">Lagu Lain - Penyanyi A</a></li>
            <li class="mb-2"><a href="#">Lagu Terbaru - Penyanyi B</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection