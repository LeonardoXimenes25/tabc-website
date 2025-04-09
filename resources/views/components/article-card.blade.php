<div class="container my-5">
  <!-- Header Section -->
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="m-0">Artikel Terbaru</h3>
      <a href="/articles" class="btn btn-link text-decoration-none">Lihat Semua →</a>
  </div>
  
  <!-- Articles Grid -->
  <div class="row">
      <!-- Article 1 -->
      <div class="col-md-6 col-lg-3 mb-4">
          <div class="card h-100 shadow-sm border-0 hover-effect"> <!-- Tambah class hover-effect -->
              <a href="/articles/1" class="stretched-link text-decoration-none" aria-label="Baca artikel: Cara Install Laravel 10"></a> <!-- Link menutupi seluruh card -->
              <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image" style="height: 180px; object-fit: cover;">
              <div class="card-body">
                  <h2 class="card-title h5 text-dark">Cara Install Laravel 10</h2> <!-- Judul tetap terlihat seperti teks biasa -->
                  <div class="d-flex align-items-center mb-3">
                      <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30" height="30">
                      <div>
                          <div class="text-muted small">By <strong>Admin</strong></div>
                          <div class="text-muted small">May 15, 2023</div>
                      </div>
                  </div>
                  <p class="card-text text-muted">Panduan lengkap install Laravel 10...</p>
              </div>
          </div>
      </div>

      <!-- Article 2 -->
      <div class="col-md-6 col-lg-3 mb-4">
          <div class="card h-100 shadow-sm border-0 hover-effect">
              <a href="/articles/2" class="stretched-link text-decoration-none" aria-label="Baca artikel: Tips Bootstrap 5"></a>
              <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image" style="height: 180px; object-fit: cover;">
              <div class="card-body">
                  <h2 class="card-title h5 text-dark">Tips Bootstrap 5</h2>
                  <div class="d-flex align-items-center mb-3">
                      <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30" height="30">
                      <div>
                          <div class="text-muted small">By <strong>Jane Doe</strong></div>
                          <div class="text-muted small">May 10, 2023</div>
                      </div>
                  </div>
                  <p class="card-text text-muted">Rahasia layout responsive...</p>
              </div>
          </div>
      </div>
      
      <!-- Tambahkan 2 card lainnya di sini -->
      <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm border-0 hover-effect"> <!-- Tambah class hover-effect -->
            <a href="/articles/1" class="stretched-link text-decoration-none" aria-label="Baca artikel: Cara Install Laravel 10"></a> <!-- Link menutupi seluruh card -->
            <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image" style="height: 180px; object-fit: cover;">
            <div class="card-body">
                <h2 class="card-title h5 text-dark">Cara Install Laravel 10</h2> <!-- Judul tetap terlihat seperti teks biasa -->
                <div class="d-flex align-items-center mb-3">
                    <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30" height="30">
                    <div>
                        <div class="text-muted small">By <strong>Admin</strong></div>
                        <div class="text-muted small">May 15, 2023</div>
                    </div>
                </div>
                <p class="card-text text-muted">Panduan lengkap install Laravel 10...</p>
            </div>
        </div>
    </div>

    <!-- Article 2 -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm border-0 hover-effect">
            <a href="/articles/2" class="stretched-link text-decoration-none" aria-label="Baca artikel: Tips Bootstrap 5"></a>
            <img src="{{asset('images/church-hero.jpg')}}" class="card-img-top" alt="Article Image" style="height: 180px; object-fit: cover;">
            <div class="card-body">
                <h2 class="card-title h5 text-dark">Tips Bootstrap 5</h2>
                <div class="d-flex align-items-center mb-3">
                    <img src="{{asset('images/church-hero.jpg')}}" alt="Author" class="rounded-circle me-2" width="30" height="30">
                    <div>
                        <div class="text-muted small">By <strong>Jane Doe</strong></div>
                        <div class="text-muted small">May 10, 2023</div>
                    </div>
                </div>
                <p class="card-text text-muted">Rahasia layout responsive...</p>
            </div>
        </div>
    </div>
  </div>
</div>