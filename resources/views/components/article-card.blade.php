<div class="article-card card mb-4 shadow-sm">
    <div class="card-body">
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text text-muted">
        <small>
          Oleh <strong>{{ $author }}</strong> • 
          {{ $publishedAt->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{{ $excerpt }}</p>
      <a href="{{ $url }}" class="btn btn-outline-primary">Baca Selengkapnya</a>
    </div>
  </div>