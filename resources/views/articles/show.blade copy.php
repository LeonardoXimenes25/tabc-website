@extends('layouts.app')

@section('title', $post->title . ' | TABCTL')

@section('content')
<!-- Main Container -->
<div class="container my-4">
  @include('components.breadcumb')
  
  {{-- artikel section start --}}
  <div class="row">
    <div class="col-lg-8">
      <!-- Konten artikel -->
      <article>
        <!-- Article Header -->
        <div class="mb-4">
          <h1 class="fw-bold mb-3" style="font-size: 2rem;">{{ $post->title }}</h1>
          <div class="d-flex align-items-center">
            <img src="{{ asset($post->image_url) }}" alt="Author" class="rounded-circle me-3" width="50">
            <div>
              <div class="fw-bold">{{ $post->author }}</div>
              <div class="text-muted small">
                <i class="far fa-calendar-alt me-1"></i> 
                {{ $post->created_at->format('d F Y') }} • 
                <i class="far fa-clock me-1"></i>
                {{ $post->created_at->diffForHumans() }}
              </div>
            </div>
          </div>
        </div>

        <!-- Featured Image -->
        <img src="{{ asset($post->image_url) }}" class="img-fluid rounded-3 mb-4 shadow-sm" alt="{{ $post->title }}">

        <!-- Article Content -->
        <div class="article-content mb-5">
          {!! $post->body !!}
        </div>

        <!-- Tags -->
        @if($post->tags)
        <div class="mb-5">
          @foreach($post->tags as $tag)
            <span class="badge bg-secondary me-2">{{ $tag }}</span>
          @endforeach
        </div>
        @endif
      </article>

      <!-- Comment Section -->
      <section class="mt-5 pt-4 border-top">
        <h3 class="mb-4">
          <i class="bi bi-chat-square-text me-2"></i>
          Comments ({{ $post->comments->count() }})
        </h3>

        <!-- Comment Form -->
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Leave a Comment</h5>
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
              @csrf
              <div class="mb-3">
                <textarea class="form-control" name="content" rows="3" placeholder="Write your comment here..." required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
          </div>
        </div>

        <!-- Comments List -->
        <div class="comments-list">
          @foreach($post->comments as $comment)
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex">
                <img src="{{ $comment->user->avatar ?? 'https://via.placeholder.com/40' }}" 
                     alt="User" class="rounded-circle me-3" width="40">
                <div>
                  <div class="d-flex justify-content-between">
                    <h6 class="fw-bold mb-1">{{ $comment->user->name }}</h6>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                  </div>
                  <p class="mb-2">{{ $comment->content }}</p>
                  <button class="btn btn-sm btn-outline-secondary">Reply</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
      <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Artikel Terbaru</h5>
        </div>
        <div class="list-group list-group-flush">
          @foreach($recentPosts as $recent)
          <a href="{{ route('articles.show', $recent->slug) }}" class="list-group-item list-group-item-action">
            <div class="fw-bold">{{ $recent->title }}</div>
            <small class="text-muted">{{ $recent->created_at->diffForHumans() }}</small>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  {{-- artikel section end --}}
</div>
@endsection