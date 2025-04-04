@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="my-4">Lirik Lagu Terpopuler</h1>
  
  <div class="row">
    <!-- Song 1 -->
    <div class="col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title">Lagu 1 - Penyanyi A</h3>
          <div class="lyrics-preview">
            <p>Ini adalah preview lirik lagu bagian pertama...</p>
          </div>
          <a href="/lyrics/1" class="btn btn-outline-primary mt-2">Lihat Lirik Lengkap</a>
        </div>
      </div>
    </div>
    
    <!-- Song 2 -->
    <div class="col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title">Lagu 2 - Penyanyi B</h3>
          <div class="lyrics-preview">
            <p>Preview lirik lagu kedua yang berbeda...</p>
          </div>
          <a href="/lyrics/2" class="btn btn-outline-primary mt-2">Lihat Lirik Lengkap</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection