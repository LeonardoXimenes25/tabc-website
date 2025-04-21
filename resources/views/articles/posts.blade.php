@extends('layouts.app')

@section('title', 'Artikel | TABCTL')

@section('content')
<div class="container my-4" style="min-height: 100vh;">


    {{-- artcle component --}}
    @livewire('posts-article')

    <style>
        .transition-card {
            transition: all 0.3s ease;
        }
        
        .transition-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .transition-card:active {
            transform: translateY(0) scale(0.98);
        }
        
        .transition-btn {
            transition: all 0.2s ease;
        }
        
        .transition-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
        }
        
        .transition-btn:active {
            transform: translateY(0);
        }
    </style>
</div>
@endsection
