@extends('layouts.app')

@section('content')
<div class="row">
  <!-- Main Content -->
  <div class="col-lg-8">
    <article class="mb-5">
      <h1 class="display-4 mb-3">Cara Install Laravel 10</h1>
      
      <div class="d-flex align-items-center mb-4">
        <img src="https://via.placeholder.com/40" alt="Author" class="rounded-circle me-2">
        <div>
          <div class="fw-bold">Admin</div>
          <small class="text-muted">Diposting 5 hari lalu • 10 menit membaca</small>
        </div>
      </div>
      
      <img src="https://via.placeholder.com/800x400" class="img-fluid rounded mb-4" alt="Featured Image">
      
      <div class="article-content">
        <p>Laravel adalah framework PHP yang powerful untuk membangun aplikasi web modern...</p>
        <!-- More content -->
      </div>
    </article>
  </div>

  <!-- Sidebar -->
  <div class="col-lg-4">
    <!-- Latest Articles -->
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Artikel Terbaru</h5>
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action">
          <div class="fw-bold">Tips Menggunakan Bootstrap 5</div>
          <small class="text-muted">2 hari lalu</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="fw-bold">Panduan MySQL untuk Pemula</div>
          <small class="text-muted">1 minggu lalu</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="fw-bold">Fundamental JavaScript ES6</div>
          <small class="text-muted">2 minggu lalu</small>
        </a>
      </div>
    </div>

    <!-- Top Articles -->
    <div class="card shadow-sm">
      <div class="card-header bg-danger text-white">
        <h5 class="mb-0">Artikel Terpopuler</h5>
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex justify-content-between">
            <span class="fw-bold">Laravel vs CodeIgniter</span>
            <span class="badge bg-primary rounded-pill">1.2k</span>
          </div>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex justify-content-between">
            <span class="fw-bold">Cara Membuat REST API</span>
            <span class="badge bg-primary rounded-pill">980</span>
          </div>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex justify-content-between">
            <span class="fw-bold">Optimasi Database MySQL</span>
            <span class="badge bg-primary rounded-pill">750</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection