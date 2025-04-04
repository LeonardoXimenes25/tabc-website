<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/">MySite</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('articles') ? 'active' : '' }}" href="/articles">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('lyrics') ? 'active' : '' }}" href="/lyrics">Lirik Lagu</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>