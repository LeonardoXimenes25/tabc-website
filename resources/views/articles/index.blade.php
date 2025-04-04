@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Daftar Artikel</h1>

    <!-- Artikel 1 -->
    <div class="card mb-3">
      <div class="card-body">
        <h3>Cara Install Laravel</h3>
        <p>Panduan lengkap instalasi Laravel untuk pemula...</p>
        <a href="/articles/1" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
      </div>
    </div>
    
    <!-- Artikel 2 -->
    <div class="card mb-3">
      <div class="card-body">
        <h3>Tips Bootstrap 5</h3>
        <p>Rahasia membuat layout responsive dengan Bootstrap...</p>
        <a href="/articles/2" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
      </div>
    </div>
</div>

@endsection