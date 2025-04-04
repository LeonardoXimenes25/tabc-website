@extends('layouts.app')

@section('content')
<div class="container my-4">
  <div class="row">
    <!-- Main Content Column -->
    <div class="col-lg-8 pe-lg-4">
      <h2 class="mb-4">Daftar Lirik Lagu</h2>
      
      <!-- Song Grid -->
      <div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
        <!-- Song 1 -->
        <div class="col">
          <div class="song-item text-center">
            <img src="{{asset('images/church-hero.jpg')}}" class="img-fluid mb-2" alt="Song Cover">
            <h3 class="h6 mb-1">Made Alive</h3>
            <p class="text-muted small">JPCC Worship</p>
            <a href="/lyrics/1" class="stretched-link"></a>
          </div>
        </div>
        
        <!-- Song 2 -->
        <div class="col">
          <div class="song-item text-center">
            <img src="{{asset('images/church-hero.jpg')}}" class="img-fluid mb-2" alt="Song Cover">
            <h3 class="h6 mb-1">God of Victory</h3>
            <p class="text-muted small">JPCC Worship</p>
            <a href="/lyrics/2" class="stretched-link"></a>
          </div>
        </div>
        
        <!-- Song 3 -->
        <div class="col">
          <div class="song-item text-center">
            <img src="{{asset('images/church-hero.jpg')}}" class="img-fluid mb-2" alt="Song Cover">
            <h3 class="h6 mb-1">Percaya</h3>
            <p class="text-muted small">JPCC Worship</p>
            <a href="/lyrics/3" class="stretched-link"></a>
          </div>
        </div>
        
        <!-- Song 4 -->
        <div class="col">
          <div class="song-item text-center">
            <img src="{{asset('images/church-hero.jpg')}}" class="img-fluid mb-2" alt="Song Cover">
            <h3 class="h6 mb-1">All Heaven Declares</h3>
            <p class="text-muted small">JPCC Worship</p>
            <a href="/lyrics/4" class="stretched-link"></a>
          </div>
        </div>
      </div>
      
      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
    
    <!-- Popular Songs Sidebar -->
    <div class="col-lg-4">
      <div class="sticky-top" style="top: 20px;">
        <div class="popular-songs">
          <h3 class="h5 mb-3 pb-2 border-bottom">Lagu Populer</h3>
          
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