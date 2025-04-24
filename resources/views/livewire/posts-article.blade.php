<div>
    {{-- header --}}
    @php
    $breadcrumbItems = [
    ['title' => 'Artikel', 'link' => route('articles.index'), 'active' => true]
    ];
    @endphp

    @include('partials.breadcrumb_search', ['breadcrumbItems' => $breadcrumbItems])
    {{-- end header --}}

    {{-- Artikel --}}
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h4 class="fw-bold">Artikel Terbaru</h4>
    </div>

    {{-- article start --}}
    @if ($posts->count() > 0)
        @foreach ($posts->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm transition-card">
                            <img src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body">
                                <a href="{{ route('articles.show', $post->slug) }}" class="text-decoration-none text-dark"
                                    style="font-size: 1rem">
                                    {{ $post->title }}
                                </a>
                                {{-- author, categories and date --}}
                                <div class="d-flex flex-wrap align-items-center mb-4 text-muted small my-2"
                                    style="font-size: 0.7rem">
                                    <span class="me-2">✍️ By
                                        <a href="{{ route('authors.posts', $post->author->username) }}"
                                            class="text-decoration-none text-muted fw-semibold">
                                            {{ $post->author->name }}
                                        </a>
                                    </span>
                                    <span class="me-2">
                                        <a href="{{ route('categories.show', $post->category->slug) }}"
                                            class="text-decoration-none">
                                            <span
                                                class="badge bg-primary text-white px-3 py-1 rounded-pill">{{ $post->category->name }}</span>
                                        </a>
                                    </span>
                                    <span class="me-2">🕒 {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                {{-- author, categories and date end--}}

                                <p class="card-text text-muted mt-2" style="font-size: 0.8rem">
                                    {{ Str::limit($post->body, 100) }}
                                </p>
                                <a href="{{ route('articles.show', $post->slug) }}" style="font-size: 0.7rem">
                                    Read More &gt;&gt;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="alert alert-warning text-center" role="alert">
            Belum ada artikel yang tersedia.
        </div>
    @endif
    {{-- artikel section end --}}

    {{-- Pagination --}}
@include('partials.pagination', ['paginator' => $posts])
</div>