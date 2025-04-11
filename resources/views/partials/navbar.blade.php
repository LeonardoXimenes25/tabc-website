<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top" style="background-color: #1a1a1a!important;">
    <div class="container">
      <!-- Logo + Text (Left Side) -->
      <a class="navbar-brand me-5" href="/">
        <div class="d-flex align-items-center">
          <img src="{{asset('images/cop-tabc.png')}}" alt="TABC-TL Logo" width="40" height="40" class="d-inline-block align-top me-2">
          <span class="font-weight-bold">TABC-TL</span>
        </div>
      </a>
  
      <!-- Centered Navigation -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-2">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
               Home
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
              Tentang
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ request()->is('schedule') ? 'active' : '' }}" href="/schedule">
               Jadwal Ibadah
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ request()->is('articles') ? 'active' : '' }}" href="/articles">
               Artikel
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ request()->is('lyrics') ? 'active' : '' }}" href="/lyrics">
               Lirik Lagu
            </a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link {{ request()->is('lyrics') ? 'active' : '' }}" href="/lyrics">
               Kontak Kami
            </a>
          </li>
        </ul>
      </div>
  
      <!-- Right Side - Auth Section -->
      <div class="d-flex align-items-center">
        @auth
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
              <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="/logout">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </div>
        @else
          <a href="/login" class="btn btn-outline-light"> Login
          </a>
        @endauth
      </div>
  
      <!-- Mobile Toggle -->
      <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>