<div>
    {{-- Header --}}
    @php
    $breadcrumbItems = [
        ['title' => 'Letra musika', 'link' => route('songs.index'), 'active' => true]
    ];
    @endphp

    @include('partials.breadcrumb_search', ['breadcrumbItems' => $breadcrumbItems])
    {{-- End Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <h5 class="fw-bold">
            @isset($category)
                Kategoria: <a href="{{ route('categories-songs.show', $category->slug) }}" class="text-decoration-none">{{ $category->name }}</a>
            @else
                Lista Letra Musika
            @endisset
        </h5>
    </div>

    {{-- Songs list --}}
    @if ($songs->count() > 0)
        @foreach ($songs->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $song)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm transition-card">
                            <img src="{{ asset('storage/'. $song->image_url) }}" alt="{{ $song->title }}" style="width: 100%; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <a href="{{ route('songs.show', $song->slug) }}" class="text-decoration-none text-dark"
                                    style="font-size: 1rem">
                                    {{ $song->title }}
                                </a>

                                {{-- Info --}}
                                <div class="d-flex flex-wrap align-items-center mb-4 text-muted small my-2"
                                    style="font-size: 0.7rem">
                                    <span class="me-2"><i data-feather="user"></i>
                                        <a href="{{ route('songs.byArtist', $song->artist) }}"
                                            class="text-decoration-none text-muted fw-semibold">
                                            {{ $song->artist }}
                                        </a>
                                    </span>

                                    @php
                                        $badgeColor = $song->categorysong?->getCategoryColor() ?? 'bg-secondary';
                                    @endphp
                                    <span class="me-2">
                                        @if ($song->categorysong)
                                            <a href="{{ route('categories-songs.show', $song->categorysong->slug) }}" class="text-decoration-none">
                                                <span class="badge {{ $badgeColor }} px-3 py-1 rounded-pill">
                                                    {{ $song->categorysong->name }}
                                                </span>
                                            </a>
                                        @else
                                            <span class="badge {{ $badgeColor }} px-3 py-1 rounded-pill">
                                                - Kategoria Mamuk -
                                            </span>
                                        @endif
                                    </span>

                                    <span class="me-2"><i data-feather="clock"></i> {{ $song->created_at->diffForHumans() }}</span>
                                </div>

                                <p class="mt-2 text-muted" style="font-size: 0.85rem;">
                                    {{ Str::limit(strip_tags($song->body), 100) }}
                                </p>

                                <a href="{{ route('songs.show', $song->slug) }}" style="font-size: 0.7rem">
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
            Letra musika mamuk.
        </div>
    @endif

    {{-- Pagination --}}
    @include('partials.pagination', ['paginator' => $songs])
</div>
