 <!-- Hero Section -->
 <div class="hero-wrapper">
    <div class="decorative-element"></div>
    <div class="container hero-container">
        <div class="row align-items-center">
            <!-- Kolom Pertama - Teks Selamat Datang -->
            <div class="col-lg-6 mb-4 mb-lg-0 hero-content">
                <h1 class="display-4 fw-bold mb-4 welcome-text">Bemvindu mai iha Website Igreja TABC</h1>
                <p class="lead mb-4">Bergabunglah bersama kami dalam ibadah dan persekutuan. Mari tumbuh bersama dalam iman dan kasih.</p>
                <div class="d-flex align-items-center">
                    <a href="{{route('schedules.index')}}" class="btn btn-primary btn-lg me-3">
                        <i data-feather="calendar" class="me-1"></i> Horariu Misa
                    </a>
                </div>
                <div class="mt-4 d-flex">
                    <div class="me-4">
                        <div class="fs-3 fw-bold">10+</div>
                        <div class="text-muted">Aktividade</div>
                    </div>
                    <div class="me-4">
                        <div class="fs-3 fw-bold">500+</div>
                        <div class="text-muted">Sarani</div>
                    </div>
                    <div>
                        <div class="fs-3 fw-bold">24/7</div>
                        <div class="text-muted">Orasaun</div>
                    </div>
                </div>
            </div>
            
            <!-- Kolom Kedua - Gambar Gereja -->
            <div class="col-lg-6 hero-content">
                 <picture>
                    <source srcset="{{ asset('images/church-hero-1.webp') }}" type="image/webp">
                    <img src="{{ asset('images/church-hero.jpg') }}" alt="Gereja TABC"  class="img-fluid church-img" loading="lazy">
                </picture>

                <div class="text-center mt-3">
                    <span class="badge bg-light text-dark me-2"><i class="fas fa-cross me-1"></i> Kristaun</span>
                    <span class="badge bg-light text-dark me-2"><i class="fas fa-hands-praying me-1"></i> Protestante</span>
                    <span class="badge bg-light text-dark"><i class="fas fa-heart me-1"></i> Komunidade</span>
                </div>
            </div>
        </div>
    </div>
</div>