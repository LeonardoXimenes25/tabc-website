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
          <h1 class="fw-bold mb-3" style="font-size: 2rem;">{{ $post['title'] }}</h1>
          <div class="d-flex align-items-center">
            <img src="#" alt="#" class="rounded-circle me-3" width="50">
            <div>
              <div class="fw-bold">{{ $post['author'] }}</div>
              <div class="text-muted small">
                <i class="far fa-calendar-alt me-1"></i> 
                <i class="far fa-clock me-1"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Featured Image -->
        <img src="{{ asset($post['image_url']) }}" class="img-fluid rounded-3 mb-4 shadow-sm" alt="{{ $post['title'] }}">

        <!-- post Content -->
        <div class="post-content mb-5">
         {{ $post['body']}}
        </div>
      </article>
    </div>
  </div>
  {{-- artikel section end --}}
</div>
@endsection
