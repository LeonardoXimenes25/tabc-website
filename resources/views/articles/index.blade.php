@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Header dengan breadcrumb dan search - dengan background -->
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

    <!-- Judul Artikel Terbaru dan Lihat Semua -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h2 class="fw-bold">Artikel Terbaru</h2>
        <a href="#" class="btn btn-link text-primary">Lihat Semua</a>
    </div>

    <!-- Grid Artikel (2 baris x 4 kolom) -->
    <div class="row">
        <!-- Baris 1 -->
        <div class="col-md-3 mb-4">
            <a href="/articles/1" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Cara Install Laravel</h5>
                        <p class="card-text text-muted">Panduan lengkap instalasi Laravel untuk pemula...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3 mb-4">
            <a href="/articles/2" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Tips Bootstrap 5</h5>
                        <p class="card-text text-muted">Rahasia membuat layout responsive dengan Bootstrap...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3 mb-4">
            <a href="/articles/3" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Belajar Vue.js</h5>
                        <p class="card-text text-muted">Dasar-dasar Vue.js untuk pengembangan frontend...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3 mb-4">
            <a href="/articles/4" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">MySQL untuk Pemula</h5>
                        <p class="card-text text-muted">Memahami konsep dasar database dengan MySQL...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Baris 2 -->
        <div class="col-md-3 mb-4">
            <a href="/articles/5" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Laravel Livewire</h5>
                        <p class="card-text text-muted">Membangun aplikasi dinamis tanpa JavaScript...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3 mb-4">
            <a href="/articles/6" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Tailwind CSS</h5>
                        <p class="card-text text-muted">Utility-first CSS framework untuk desain cepat...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3 mb-4">
            <a href="/articles/7" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">REST API dengan Laravel</h5>
                        <p class="card-text text-muted">Membangun API modern dengan Laravel...</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3 mb-4">
            <a href="/articles/8" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm transition-card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Git untuk Developer</h5>
                        <p class="card-text text-muted">Version control system untuk kolaborasi tim...</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Tombol Lihat Selanjutnya -->
    <div class="text-center mt-3">
        <button class="btn btn-primary px-4 py-2 shadow-sm transition-btn">Lihat Selanjutnya</button>
    </div>
</div>

<style>
    /* Custom CSS untuk animasi dan hover */
    .transition-card {
        transition: all 0.3s ease;
    }
    
    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .transition-card:active {
        transform: translateY(0) scale(0.98);
    }
    
    .transition-btn {
        transition: all 0.2s ease;
    }
    
    .transition-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }
    
    .transition-btn:active {
        transform: translateY(0);
    }
</style>
@endsection