<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top" style="height: 70px;">
    <div class="container">
        <!-- Logo dan Teks -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <!-- Gambar Logo -->
            <img src="{{ asset('images/cop-tabc.png') }}" alt="Logo TABCTL" style="height: 50px; margin-right: 10px;">
            <!-- Teks di sebelah logo -->
            <span class="fs-4">TABCTL</span>
        </a>

        <!-- Tombol Toggle (untuk tampilan mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <!-- Menu Tengah -->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link fs-5" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link fs-5" href="#">Jadwal Ibadah</a></li>
                <li class="nav-item"><a class="nav-link fs-5" href="#">Artikel Rohani</a></li>
                <li class="nav-item"><a class="nav-link fs-5" href="#">Kontak</a></li>
            </ul>
        </div>

        <!-- Bagian Auth (Placeholder tanpa backend) -->
        <div class="d-flex">
            <a href="#" class="btn btn-outline-light me-2 fs-5">Login</a>
            <a href="#" class="btn btn-primary fs-5">Register</a>
        </div>
    </div>
</nav>
