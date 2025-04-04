@extends('layouts.app')

@section('content')
    <section class="schedule-section" id="jadwal-ibadah">
            <div class="container my-4">
                <h2 class="display-5 fw-bold text-center section-title">Jadwal Ibadah</h2>
                
                <div class="row g-4">
                    <!-- Ibadah Minggu -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card schedule-card card-sunday p-4">
                            <div class="schedule-icon icon-sunday">
                                <i class="fas fa-church"></i>
                            </div>
                            <h3 class="schedule-time">08:00 - 10:00</h3>
                            <h4 class="schedule-title">Ibadah Minggu</h4>
                            <p class="schedule-detail"><i class="fas fa-map-marker-alt me-2"></i>Ruang Utama Gereja</p>
                            <p class="schedule-detail"><i class="fas fa-user me-2"></i>Pdt. Jonathan Smith</p>
                            <p class="mb-3">Ibadah utama mingguan dengan pujian penyembahan dan firman Tuhan.</p>
                            <a href="#" class="btn btn-outline-primary">Detail Ibadah</a>
                        </div>
                    </div>
                    
                    <!-- Sekolah Minggu -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card schedule-card card-sunday-school p-4">
                            <div class="schedule-icon icon-sunday-school">
                                <i class="fas fa-child"></i>
                            </div>
                            <h3 class="schedule-time">10:00 - 11:30</h3>
                            <h4 class="schedule-title">Sekolah Minggu</h4>
                            <p class="schedule-detail"><i class="fas fa-map-marker-alt me-2"></i>Ruang Anak-anak</p>
                            <p class="schedule-detail"><i class="fas fa-user me-2"></i>Ibu Sarah Johnson</p>
                            <p class="mb-3">Pembelajaran alkitab untuk anak-anak usia 3-12 tahun dengan metode kreatif.</p>
                            <a href="#" class="btn btn-outline-primary">Info Pendaftaran</a>
                        </div>
                    </div>
                    
                    <!-- Doa Rabu -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card schedule-card card-wednesday p-4">
                            <div class="schedule-icon icon-wednesday">
                                <i class="fas fa-hands-praying"></i>
                            </div>
                            <h3 class="schedule-time">19:00 - 20:30</h3>
                            <h4 class="schedule-title">Doa Rabu</h4>
                            <p class="schedule-detail"><i class="fas fa-map-marker-alt me-2"></i>Ruang Doa</p>
                            <p class="schedule-detail"><i class="fas fa-user me-2"></i>Pdt. Michael Brown</p>
                            <p class="mb-3">Persekutuan doa tengah minggu untuk pertumbuhan rohani bersama.</p>
                            <a href="#" class="btn btn-outline-primary">Join Zoom Meeting</a>
                        </div>
                    </div>
                    
                    <!-- Ibadah Yang Akan Datang -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card schedule-card card-upcoming p-4 position-relative">
                            <span class="upcoming-badge">BARU</span>
                            <div class="schedule-icon icon-upcoming">
                                <i class="fas fa-calendar-star"></i>
                            </div>
                            <h3 class="schedule-time">Sabtu, 25 Nov 2023</h3>
                            <h4 class="schedule-title">Retreat Keluarga</h4>
                            <p class="schedule-detail"><i class="fas fa-map-marker-alt me-2"></i>Bukit Doa Lembang</p>
                            <p class="schedule-detail"><i class="fas fa-user me-2"></i>Tim Pengajar TABC</p>
                            <p class="mb-3">Retreat khusus keluarga dengan tema "Membangun Keluarga yang Kuat dalam Tuhan".</p>
                            <a href="#" class="btn btn-outline-primary">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                
                <!-- Jadwal Lengkap -->
                <div class="text-center mt-5">
                    <a href="#" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-calendar-alt me-2"></i> Lihat Jadwal Lengkap
                    </a>
                </div>
            </div>
        </section>    
@endsection