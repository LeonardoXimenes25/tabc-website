@extends('layouts.app')

@section('title', 'Lirik-Lagu | TABCTL')

@section('content')
    <div class="container my-4" style="min-height: 100vh;">

        @livewire('songs-list')

    </div>

@endsection