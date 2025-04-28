<div class="container my-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="m-0 fw-bold">Artikel Terbaru</h3>
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
  
                  {{-- Author, Categories and Date --}}
                  <div class="d-flex flex-wrap align-items-center mb-4 text-muted small my-2"
                                    style="font-size: 0.7rem">
                                    <span class="me-2">✍️ By
                                        <a href="{{ route('authors.posts', $post->author->username) }}"
                                            class="text-decoration-none text-muted fw-semibold">
                                            {{ $post->author->name }}
                                        </a>
                                    </span>
                                    <span class="me-2">
                                        <a href="{{ route('categories.show', $post->category->slug) }}" class="text-decoration-none">
                                            <span class="badge {{ $post->category->getCategoryColor() }} text-white px-3 py-1 rounded-pill">
                                                {{ $post->category->name }}
                                            </span>
                                        </a>
                                    </span>
                                    <span class="me-2">🕒 {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                  {{-- Author, categories and Date end --}}
  
                  <!-- Artikel Excerpt -->
                  <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                      {{ Str::limit($post->body, 100) }}
                  </p>
  
                  <!-- Read More Link -->
                  <a href="{{ route('articles.show', $post->slug) }}" style="font-size: 0.7rem">
                      Baca Selekapnya &gt;&gt;
                  </a>
              </div>
          </div>
      </div>
      @endforeach
  </div>
  
  <style>
    .transition-card {
        transition: all 0.3s ease;
    }
    
    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .transition-card:active {
        transform: translateY(0) scale(0.98);
    }
    
    .transition-btn {
        transition: all 0.2s ease;
    }
    
    .transition-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }
    
    .transition-btn:active {
        transform: translateY(0);
    }
</style>
    