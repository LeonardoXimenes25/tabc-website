@extends('layouts.app')

@section('title', $post->title . ' | TABCTL')

@section('content')
<!-- Main Container -->
<div class="container my-5">
    {{-- Header start --}}
    <div class="row mb-4 bg-light rounded-3 p-3 shadow-sm">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none d-flex align-items-center">
                            <i data-feather="home" class="me-1"></i>Baranda
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      <a href="{{ route('articles.index') }}">Artigu Espiritual</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Str::limit($post->title, 30) }}
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4">
            <form class="d-flex">
                <input class="form-control form-control-sm shadow-sm" type="search" placeholder="Cari artikel..." aria-label="Search">
            </form>
        </div>
    </div>
    {{-- Header end --}}

    <div class="row g-4">
        {{-- Main Content --}}
        <div class="col-lg-8">
            <article class="card shadow-sm mb-4 border-0">
                <img src="{{ asset('storage/' . $post->image_url) }}"
                     class="card-img-top img-fluid rounded-top"
                     alt="{{ $post->title }}"
                     style="height: 400px; object-fit: cover;">

                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            {{ $post->category->name }}
                        </span>
                        <small class="text-muted">
                            <i data-feather="clock" class="me-1"></i> {{ $post->created_at->diffForHumans() }}
                        </small>
                    </div>

                    <h1 class="card-title mb-3 fw-bold">{{ $post->title }}</h1>

                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <a href="{{ route('authors.posts', $post->author->username) }}"
                                class="text-decoration-none text-dark fw-semibold">
                                {{ $post->author->name }}
                            </a>
                            <p class="small text-muted mb-0"><i data-feather="user" class="me-1"></i>Autor</p>
                        </div>
                    </div>

                    <hr>

                    <div class="article-content" style="font-size: 1rem">
                        {!! ($post->body) !!}
                    </div>
                </div>
            </article>

            {{-- Comments Section --}}
            <div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="fw-bold mb-0">
            <i class="far fa-comments me-2 text-primary"></i> Komentariu
        </h5>
    </div>

    <div class="card-body p-4">
        {{-- Form tambah komentar baru --}}
        @auth
        <form action="{{ route('articles.comments.store', $post->slug) }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <textarea name="body" class="form-control" rows="3" placeholder="Prenxe ita nia komentariu..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">
                <i class="far fa-paper-plane me-1"></i> manda
            </button>
        </form>
        @else
        <div class="alert alert-light border mb-4">
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">Login</a>
            Atu fo komentariu.
        </div>
        @endauth


        {{-- Daftar komentar dan balasan --}}
        <div class="comments-list">
            @forelse ($post->comments->whereNull('parent_id') as $comment)
                @include('components.comment', ['comment' => $comment, 'article' => $post, 'level' => 0])
            @empty
                <div class="text-center py-4">
                    <i class="far fa-comment-dots fa-2x text-muted mb-2"></i>
                    <p class="text-muted">Seidauk iha komentariu</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

    </div>
        {{-- Sidebar --}}
        <div class="col-lg-4">            
            {{-- start sidebar --}}

            @include('partials.sidebar', [
            'title' => 'Artikel Terbaru',
            'items' => \App\Models\Article::latest()->take(5)->get(),
            'route' => 'articles.show',
            'icon' => 'fas fa-newspaper'
            ])
            {{-- end sidebar --}}

            {{-- Author Info --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-user-edit me-2 text-primary"></i> Tentang Penulis
                    </h5>
                </div>
                <div class="card-body text-center">
                    <h5 class="fw-bold mb-1">{{ $post->author->name }}</h5>
                    <p class="text-muted small mb-3">Penulis di TABCTL</p>
                    <p class="mb-0">{{ $post->author->bio ?? 'Penulis aktif dengan berbagai kontribusi artikel menarik.' }}</p>
                </div>
            </div>
            {{-- author end --}}

            {{-- Bible Verse --}}
            <div class="card bg-primary text-white shadow-sm border-0 mb-4">
                <div class="card-body text-center py-4">
                    <i class="fas fa-bible fa-2x mb-3"></i>
                    <blockquote class="blockquote mb-0">
                        <p class="fs-5">"Karena begitu besar kasih Allah akan dunia ini..."</p>
                        <footer class="blockquote-footer text-white-50 mt-2">Yohanes 3:16</footer>
                    </blockquote>
                </div>
            </div>
            {{-- bible verse end --}}

        </div>
    </div>
</div>

<style>
    .hover-effect:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1rem 0;
    }

    .article-content p {
        margin-bottom: 1.2rem;

    .comment-item {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #dee2e6;
    margin-bottom: 10px;
}
.replies-list {
    margin-top: 10px;
}


    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Toggle form balas
    document.querySelectorAll('.toggle-reply-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const form = document.getElementById('reply-form-' + id);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                this.textContent = 'kansela';
            } else {
                form.style.display = 'none';
                this.textContent = 'Replay';
            }
        });
    });

    // Toggle semua balasan tersembunyi
    document.querySelectorAll('.show-more-replies-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const container = document.getElementById('hidden-replies-' + id);
            if (container.classList.contains('d-none')) {
                container.classList.remove('d-none');
                this.textContent = '🔼 Eskonder replay';
            } else {
                container.classList.add('d-none');
                const count = container.children.length;
                this.textContent = '🔽 Haree ' + count + ' replay';
            }
        });
    });
});

</script>

@endsection
