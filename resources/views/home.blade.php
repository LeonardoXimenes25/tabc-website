@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="hero-section text-center py-5" style="background-color: #E6F0FF; border-radius: 15px;">
    <h1 class="display-4 fw-bold text-church-blue">
        <i class="fas fa-church me-2"></i>Selamat Datang
    </h1>
    <p class="lead">Gereja Kasih - Membangun Iman Dalam Kasih Kristus</p>
</div>

<div class="row mt-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-church-blue">
            <div class="card-body text-center">
                <i class="fas fa-calendar-alt fa-3x text-church-blue mb-3"></i>
                <h5 class="card-title">Jadwal Ibadah</h5>
                <p class="card-text">Lihat jadwal ibadah mingguan kami</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-church-blue">
            <div class="card-body text-center">
                <i class="fas fa-music fa-3x text-church-blue mb-3"></i>
                <h5 class="card-title">Lirik Lagu</h5>
                <p class="card-text">Kumpulan lirik lagu rohani</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-church-blue">
            <div class="card-body text-center">
                <i class="fas fa-book-open fa-3x text-church-blue mb-3"></i>
                <h5 class="card-title">Artikel Rohani</h5>
                <p class="card-text">Renungan dan bahan pembelajaran</p>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-church mt-5 text-center">
    <h4><i class="fas fa-bullhorn me-2"></i>Pengumuman</h4>
    <p>Ibadah Natal akan dilaksanakan pada 25 Desember 2023 pukul 09.00 WIB</p>
</div>
@endsection