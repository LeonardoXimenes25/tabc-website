@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center my-5">Latest Articles</h1>
  
  <div class="row">
    <!-- Article 1 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image">
        <div class="card-body">
          <h2 class="card-title h5">Cara Install Laravel 10</h2>
          
          <div class="d-flex align-items-center mb-3">
            <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30">
            <div>
              <div class="text-muted small">By <strong>Admin</strong></div>
              <div class="text-muted small">Published: May 15, 2023</div>
            </div>
          </div>
          
          <p class="card-text">Panduan lengkap untuk menginstall Laravel 10 di berbagai sistem operasi...</p>
          <a href="/articles/1" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>

    <!-- Article 2 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image">
        <div class="card-body">
          <h2 class="card-title h5">Tips Bootstrap 5</h2>
          
          <div class="d-flex align-items-center mb-3">
            <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30">
            <div>
              <div class="text-muted small">By <strong>Jane Doe</strong></div>
              <div class="text-muted small">Published: May 10, 2023</div>
            </div>
          </div>
          
          <p class="card-text">Rahasia menggunakan Bootstrap 5 untuk membuat layout responsive dengan cepat...</p>
          <a href="/articles/2" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>

    <!-- Article 3 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm">
        <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image">
        <div class="card-body">
          <h2 class="card-title h5">Dasar-Dasar MySQL</h2>
          
          <div class="d-flex align-items-center mb-3">
            <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30">
            <div>
              <div class="text-muted small">By <strong>John Smith</strong></div>
              <div class="text-muted small">Published: May 5, 2023</div>
            </div>
          </div>
          
          <p class="card-text">Belajar query dasar MySQL untuk pengembangan aplikasi web modern...</p>
          <a href="/articles/3" class="btn btn-outline-primary">Read More</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection