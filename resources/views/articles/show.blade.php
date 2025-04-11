@extends('layouts.app')

@section('content')
<!-- Main Container -->
<div class="container my-4">
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
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4">
        <form class="d-flex">
            <input class="form-control form-control-sm shadow-sm" type="search" placeholder="Cari artikel..." aria-label="Search">
        </form>
    </div>
</div>

  <div class="row">
    <!-- Main Content -->
    <div class="col-lg-8">
      <!-- Konten artikel tetap sama seperti sebelumnya -->
      <article>
        <!-- Article Header -->
        <div class="mb-4">
          <h1 class="fw-bold mb-3" style="font-size: 2rem;">Cara Install Laravel 10</h1>
          <div class="d-flex align-items-center">
            <img src="https://via.placeholder.com/50" alt="Author" class="rounded-circle me-3">
            <div>
              <div class="fw-bold">Admin</div>
              <div class="text-muted small">
                <i class="far fa-calendar-alt me-1"></i> May 15, 2023 • 
                <i class="far fa-clock me-1"></i> 5 min read
              </div>
            </div>
          </div>
        </div>

        <!-- Featured Image -->
        <img src="https://via.placeholder.com/800x450?text=Laravel" class="img-fluid rounded-3 mb-4 shadow-sm" alt="Featured Image">

        <!-- Article Content -->
        <div class="article-content mb-5">
          <p>Laravel adalah framework PHP yang powerful untuk membangun aplikasi web modern. Berikut panduan instalasinya:</p>
          <h3>Persyaratan Sistem</h3>
          <p>Pastikan server Anda memenuhi:</p>
          <ul>
            <li>PHP 8.1 atau lebih baru</li>
            <li>Composer terinstal</li>
            <li>Ekstensi PHP yang diperlukan</li>
          </ul>
          <h3>Langkah Instalasi</h3>
          <p>Jalankan perintah berikut di terminal:</p>
          <pre><code>composer create-project laravel/laravel my-project</code></pre>
        </div>

        <!-- Tags -->
        <div class="mb-5">
          <span class="badge bg-secondary me-2">Laravel</span>
          <span class="badge bg-secondary me-2">PHP</span>
          <span class="badge bg-secondary">Web Development</span>
        </div>

        <!-- Comment Section -->
        <section class="mt-5 pt-4 border-top">
          <h3 class="mb-4">
            <i class="bi bi-chat-square-text me-2"></i>
            Comments (2)
          </h3>

          <!-- Comment Form -->
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Leave a Comment</h5>
              <form>
                <div class="mb-3">
                  <textarea class="form-control" rows="3" placeholder="Write your comment here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
              </form>
            </div>
          </div>

          <!-- Comments List -->
          <div class="comments-list">
            <!-- Comment 1 -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex">
                  <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle me-3" width="40">
                  <div>
                    <div class="d-flex justify-content-between">
                      <h6 class="fw-bold mb-1">John Doe</h6>
                      <small class="text-muted">2 days ago</small>
                    </div>
                    <p class="mb-2">Great article! Very helpful for beginners.</p>
                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Comment 2 -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex">
                  <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle me-3" width="40">
                  <div>
                    <div class="d-flex justify-content-between">
                      <h6 class="fw-bold mb-1">Jane Smith</h6>
                      <small class="text-muted">1 week ago</small>
                    </div>
                    <p class="mb-2">I found a typo in section 3, otherwise excellent content!</p>
                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </article>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
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
        </div>
      </div>
    </div>
  </div>
</div>

<style>
/* Custom Styles */
.breadcrumb {
  padding: 0;
  margin: 0;
}
.breadcrumb-item a {
  transition: color 0.2s;
}
.breadcrumb-item a:hover {
  color: #0d6efd !important;
}
.input-group-text {
  transition: all 0.3s;
}
.form-control:focus {
  box-shadow: none;
  border-color: #dee2e6;
}
.article-content h3 {
  margin-top: 2rem;
  margin-bottom: 1rem;
  color: #333;
}
.article-content pre {
  background: #f8f9fa;
  padding: 1rem;
  border-radius: 0.5rem;
  border-left: 4px solid #0d6efd;
}
</style>

<script>
// Search functionality
document.querySelector('input[name="q"]').addEventListener('keypress', function(e) {
  if (e.key === 'Enter') {
    this.form.submit();
  }
});
</script>
@endsection