<nav class="navbar navbar-expand-lg navbar-dark bg-church">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="{{asset('images/cop-tabc.png')}}" alt="Logo" height="40">
        Gereja Kasih
      </a>
  
      <!-- Toggle Button (Mobile) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- Menu Items -->
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="fas fa-home me-1"></i> Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-calendar-alt me-1"></i> Jadwal Ibadah
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-music me-1"></i> Lirik Lagu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-book-open me-1"></i> Artikel
            </a>
          </li>
        </ul>
  
        <!-- Right Side (Contoh: Tombol Live & User) -->
        <div class="d-flex">
          <a href="#" class="btn btn-live me-3">
            <i class="fas fa-broadcast-tower me-1"></i> LIVE
          </a>
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <img src="https://via.placeholder.com/30x30/1E3A8A/FFFFFF?text=U" class="rounded-circle me-1">
              User
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>