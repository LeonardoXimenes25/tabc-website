@extends('layouts.app')

@section('title', $post->title . ' | TABCTL')

@section('content')
<!-- Main Container -->
<div class="container my-4">
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
                        <a href="{{ route('articles.index') }}">Artikel</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4">
          {{-- <form class="d-flex" action="{{ route('articles.search') }}" method="GET">
            <input 
                class="form-control form-control-sm shadow-sm" 
                type="search" 
                name="query" 
                placeholder="Cari artikel..." 
                aria-label="Search"
                value="{{ request()->query('query') }}"
                oninput="this.form.submit()" 
            >
        </form> --}}
        </div>
    </div>
    {{-- end header --}}

    {{-- single post article --}}
    <div class="container mt-5">
      <div class="row">
          <!-- Konten Utama -->
          <div class="col-lg-8">
              <div class="card border-0 shadow-sm mb-4">
                <img 
  src="{{ asset($post->image_url) }}" 
  class="img-fluid rounded mx-auto d-block"
  alt="{{ $post->title }}"
  style="max-width: 90%; max-height: 400px; object-fit: cover;">
    
                  <div class="card-body">
                      <h2>{{ $post->title }}</h2>
                      <div class="text-muted mb-2" style="font-size: 0.85rem;">
                          Oleh <strong>{{ $post->author->name }}</strong> • {{ $post->created_at->diffForHumans() }}
                      </div>
                      <p class="mt-3" style="line-height: 1.7rem;">
                          {!! nl2br(e($post->body)) !!}
                      </p>
                  </div>
              </div>
          </div>

          <!-- Sidebar -->
<div class="col-lg-4">
  {{-- Widget: Artikel Terkait --}}
  <div class="mb-4">
      <div class="card shadow-sm border-0 rounded-3">
          <div class="card-header bg-light text-primary fw-bold">
              <i class="bi bi-collection me-2"></i>Artikel Terkait
          </div>
          <div class="card-body p-0">
              @foreach($relatedPosts as $related)
              <div class="d-flex justify-content-between align-items-center border-bottom p-3">
                  <a href="{{ route('articles.show', $related->slug) }}" class="text-decoration-none text-dark related-post">
                      <strong>{{ Str::limit($related->title, 40) }}</strong>
                      <br>
                      <small class="text-muted">{{ $related->created_at->diffForHumans() }}</small>
                  </a>
                  <i class="bi bi-arrow-right-circle text-primary"></i>
              </div>
              @endforeach
          </div>
      </div>
  </div>

  {{-- Widget: Tentang Penulis --}}
  <div class="mb-4">
      <div class="card shadow-sm border-0 rounded-3">
          <div class="card-header bg-light text-primary fw-bold">
              <i class="bi bi-person-circle me-2"></i>Tentang Penulis
          </div>
          <div class="card-body">
              <p class="text-muted" style="font-size: 0.9rem;">
                  <strong>{{ $post->author->name }}</strong> adalah penulis aktif di website ini, dengan banyak kontribusi artikel bermanfaat.
              </p>
          </div>
      </div>
  </div>

  {{-- Widget: Ayat Alkitab --}}
  <div class="mb-4">
      <div class="card bg-gradient-dark text-white shadow-sm border-0 rounded-3">
          <div class="card-body">
              <blockquote class="blockquote mb-0 text-white">
                  <p>“Karena begitu besar kasih Allah akan dunia ini...”</p>
                  <footer class="blockquote-footer text-white-50">Yohanes 3:16</footer>
              </blockquote>
          </div>
      </div>
  </div>
</div>





      </div>
  </div>
  {{-- end single post artikel --}}
  

@endsection
