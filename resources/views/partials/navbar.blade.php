<nav class="navbar navbar-dark bg-dark fixed-top py-2">
  <div class="container">
    <!-- Logo + Brand -->
    <a class="navbar-brand me-5" href="/">
      <div class="d-flex align-items-center">
        <img src="{{ asset('images/cop-tabc.png') }}" alt="TABC-TL Logo" width="40" height="40" class="d-inline-block align-top me-2">
        <span class="fw-bold">TABC-TL</span>
      </div>
    </a>
    
    <!-- Desktop Navigation (visible on lg and up) -->
    <div class="d-none d-lg-block">
      <ul class="navbar-nav mx-auto d-flex flex-row">
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">Tentang</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('schedule') ? 'active' : '' }}" href="/schedule">Jadwal Ibadah</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}" href="/articles">Artikel</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('lyrics') ? 'active' : '' }}" href="/lyrics">Lirik Lagu</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Kontak Kami</a>
        </li>
      </ul>
    </div>
    
    <!-- Desktop Login/Logout Button (visible on lg and up) -->
    <div class="d-none d-lg-block ms-3">
      @auth
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-light">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
      @endauth
    </div>
    
    <!-- Mobile Toggle Button (hidden on lg and up) -->
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Offcanvas Menu (mobile only) -->
    <div class="offcanvas offcanvas-end bg-dark text-white d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">TABCTL</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <!-- Mobile Navigation Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('schedule') ? 'active' : '' }}" href="/schedules">Jadwal Ibadah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}" href="/articles">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('lyrics') ? 'active' : '' }}" href="/lyrics">Lirik Lagu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contacts">Kontak Kami</a>
          </li>
        </ul>
        
        <!-- Mobile Login/Logout Button -->
        <div class="mt-4 pt-3 border-top border-secondary">
          @auth
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-outline-light w-100">Logout</button>
            </form>
          @else
            <a href="{{ route('login') }}" class="btn btn-outline-light w-100">Login</a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Custom CSS for Offcanvas Menu -->
<style>
  .nav-link {
    padding: 12px 15px;
    border-radius: 10px;
    margin-bottom: 2px;
  }

  @media (max-width: 991.98px) {
    .offcanvas {
      width: 280px;
    }

    .nav-link {
      padding: 12px 15px;
      border-radius: 10px;
      margin-bottom: 2px;
    }

    .nav-link:hover, .nav-link.active {
      background-color: rgba(255, 255, 255, 0.1);
    }
  }

  .btn-close {
    filter: invert(1);
  }
</style>
