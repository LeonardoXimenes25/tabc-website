@extends('layouts.app')

@section('content')
<div class="row">
  <!-- Card 1 -->
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cara Install Laravel</h5>
        <p class="card-text">Panduan lengkap instalasi Laravel untuk pemula.</p>
        <a href="/articles/1" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  
  <!-- Card 2 -->
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tips Bootstrap 5</h5>
        <p class="card-text">Rahasia membuat layout responsive dengan Bootstrap.</p>
        <a href="/articles/2" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
</div>
@endsection