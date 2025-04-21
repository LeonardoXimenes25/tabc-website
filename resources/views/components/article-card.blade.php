<div class="container my-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="m-0">Artikel Terbaru</h3>
        <a href="{{route('articles.index')}}" class="btn btn-link text-decoration-none">Lihat Semua →</a>
    </div>
    
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-md-3 mb-4">
          <div class="card h-100 border-0 shadow-sm transition-card">
              <!-- Featured Image -->
              <img src="{{ asset($post->image_url) }}" class="card-img-top" alt="{{ $post->title }}">
  
              <div class="card-body">
                  <!-- Artikel Title sebagai Link -->
                  <a href="{{ route('articles.show', $post->slug) }}" class="text-decoration-none text-dark" style="font-size: 1rem">
                      {{ $post->title }}
                  </a>
  
                  {{-- Author and Date --}}
                  <div class="author mb-1 text-muted" style="font-size: 0.7rem">
                    By <a href="{{ route('authors.posts', $post->author->username) }}" class="text-muted">{{ $post->author->name }}</a> in <a href="{{ route('categories.show', $post->category->slug) }}" class="text-muted">{{ $post->category->name }}</a> |{{$post->created_at->diffForHumans()}}
                  </div>
  
                  <!-- Artikel Excerpt -->
                  <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                      {{ Str::limit($post->body, 100) }}
                  </p>
  
                  <!-- Read More Link -->
                  <a href="{{ route('articles.show', $post->slug) }}" style="font-size: 0.7rem">
                      Read More &gt;&gt;
                  </a>
              </div>
          </div>
      </div>
      @endforeach
  </div>
  
    