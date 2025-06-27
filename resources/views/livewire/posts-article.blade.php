<div>
    {{-- Header --}}
    @php
    $breadcrumbItems = [
        ['title' => 'Artikel', 'link' => route('articles.index'), 'active' => true]
    ];
    @endphp

    @include('partials.breadcrumb_search', ['breadcrumbItems' => $breadcrumbItems])
    {{-- End Header --}}

    {{-- Artikel --}}
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h5 class="fw-bold">Lista Artigu Espiritual</h5>
    </div>

    {{-- Artikel Start --}}
    @if ($posts->count() > 0)
        @foreach ($posts->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm transition-card">
                            <img src="{{ asset('storage/'. $post->image_url) }}" alt="{{ $post->title }}" style="width: 100%; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <a href="{{ route('articles.show', $post->slug) }}" class="text-decoration-none text-dark"
                                    style="font-size: 1rem">
                                    {{ $post->title }}
                                </a>
                                {{-- Author, Categories and Date --}}
                                <div class="d-flex flex-wrap align-items-center mb-4 text-muted small my-2"
                                    style="font-size: 0.7rem">
                                    <span class="me-2"><i data-feather="user"></i>
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
                                    <span class="me-2"><i data-feather="clock"></i> {{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                {{-- End Author, Categories and Date --}}

                                <p class="mt-2 text-muted" style="font-size: 0.85rem;">
                                    {!! Str::limit(strip_tags($post->body), 100) !!}
                                </p>   

                                <a href="{{ route('articles.show', $post->slug) }}" style="font-size: 0.7rem">
                                Lee kompletu &gt;&gt;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="alert alert-warning text-center" role="alert">
        Artigu espiritual mamuk
        </div>
    @endif
    {{-- Artikel End --}}

    {{-- Pagination --}}
    @include('partials.pagination', ['paginator' => $posts])
</div>
