<!-- resources/views/partials/hero-section.blade.php -->
<section class="hero bg-light py-5" style="height: 100vh; overflow: hidden; margin-top: 80px;">
    <div class="container h-100 d-flex align-items-center">
        <div class="row w-100">
            <!-- Kolom Teks (Teks Rata Kiri) -->
            <div class="col-md-6 text-left"> <!-- Perubahan di sini: 'text-left' -->
                <h1 class="display-4 fw-bold mb-4">Selamat Datang di Gereja Kami</h1>
                <p class="lead mb-4">Kami adalah komunitas yang berfokus pada pelayanan, kebersamaan, dan pertumbuhan rohani. Bergabunglah dengan kami dalam perjalanan iman ini!</p>
                <a href="#" class="btn btn-primary btn-lg">Lihat Jadwal Ibadah</a>
            </div>

            <!-- Kolom Gambar -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/church-hero.jpg') }}" alt="Gereja" class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>
