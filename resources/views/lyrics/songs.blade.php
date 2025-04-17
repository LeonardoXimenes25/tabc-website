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
                    <li class="breadcrumb-item active" aria-current="page">Lirik lagu</li>
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
        <a href="/articles/posts/" class="btn btn-link text-primary">Lihat Semua</a>
    </div>

{{-- lirik lagu --}}
  <div class="row">
      <div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
        <!-- Song 1 -->
        <div class="col">
          <div class="song-item text-center rounded">
            <img src="{{asset('images/church-hero.jpg')}}" class="img-fluid mb-2" alt="Song Cover">
            <h3 class="h6 mb-1">Made Alive</h3>
            <p class="text-muted small">JPCC Worship</p>
            <a href="/lyrics/1" class="stretched-link"></a>
          </div>
        </div>
      
      {{-- Pagination muncul hanya jika data ada --}}
    <div class="mt-4">
      {{ $songs->links('pagination::bootstrap-5') }}
  </div> @else
  {{-- Tampilkan pesan kosong --}}
  <div class="alert alert-warning text-center" role="alert">
          Belum ada artikel yang tersedia.
  </div>
  @endif
  {{-- post section end --}}


    <!-- Popular Songs Sidebar -->
    <div class="col-lg-4">
      <div class="sticky-top" style="top: 20px;">
        <div class="popular-songs">
          <h3 class="h5 mb-3">Lagu Populer</h3>
          
          <div class="popular-song-item mb-3">
            <div class="d-flex align-items-center">
              <span class="popular-song-rank me-3">1</span>
              <div>
                <h5 class="mb-0">RumahMu</h5>
                <small class="text-muted">Sion</small>
              </div>
            </div>
            <a href="#" class="stretched-link"></a>
          </div>
          
          <div class="popular-song-item mb-3">
            <div class="d-flex align-items-center">
              <span class="popular-song-rank me-3">2</span>
              <div>
                <h5 class="mb-0">HadiratMu</h5>
                <small class="text-muted">True Worshippers</small>
              </div>
            </div>
            <a href="#" class="stretched-link"></a>
          </div>
          
          <div class="popular-song-item mb-3">
            <div class="d-flex align-items-center">
              <span class="popular-song-rank me-3">3</span>
              <div>
                <h5 class="mb-0">Kau Yang Mulia</h5>
                <small class="text-muted">Sidney Mohede</small>
              </div>
            </div>
            <a href="#" class="stretched-link"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection