@extends('layouts.app')

@section('title', 'Beranda | TABCTL')
    
@section('content')
@include('components.hero-card')

@include('components.article-card')

@include('components.profil-card')
@endsection