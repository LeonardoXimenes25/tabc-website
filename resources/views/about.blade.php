@extends('layouts.app')

@section('title', 'Tentang | TABCTL')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- Page Header -->
      <div class="text-center mb-5">
        <h1 class="display-4">Konaba Ami</h1>
        <p class="lead">Konese Ami nia Igreja</p>
      </div>

      <!-- Church History -->
      <section class="mb-5">
        <div class="d-flex align-items-center mb-4">
          <h2 class="h4 mb-0">
            <i class="bi bi-book me-2"></i>Historia Igreja
          </h2>
        </div>
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <p>Gereja kami didirikan pada tahun 1985 oleh Pdt. Dr. Jonathan Susanto dengan jemaat awal sebanyak 30 orang. Awalnya kami berkumpul di sebuah rumah sederhana di pusat kota.</p>
            <p>Pada tahun 1995, kami pindah ke lokasi saat ini di Jl. Kebangkitan Nasional No. 45. Bangunan gereja yang sekarang merupakan hasil renovasi ketiga yang selesai pada tahun 2015.</p>
            <div class="text-center mt-3">
              <img src="https://via.placeholder.com/600x300?text=Gedung+Gereja" alt="Gedung Gereja" class="img-fluid rounded">
            </div>
          </div>
        </div>
      </section>

      <!-- Organizational Structure -->
      @include('components.structure-org')

      <!-- Vision & Mission -->
      <section>
        <div class="d-flex align-items-center mb-4">
          <h2 class="h4 mb-0">
            <i class="bi bi-bullseye text-center me-2"></i>Visaun no Misaun
          </h2>
        </div>
        
        <!-- Vision -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">Visaun</h3>
          </div>
          <div class="card-body">
            <p class="lead">"Menjadi gereja yang relevan dan menjadi berkat bagi kota dan bangsa."</p>
          </div>
        </div>
        
        <!-- Mission -->
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">Misaun</h3>
          </div>
          <div class="card-body">
            <ol>
              <li class="mb-2">Memuridkan setiap anggota jemaat untuk bertumbuh dalam iman</li>
              <li class="mb-2">Menjangkau masyarakat dengan kasih Kristus</li>
              <li class="mb-2">Membangun komunitas yang peduli dan saling mengasihi</li>
              <li class="mb-2">Mengembangkan pelayanan yang kreatif dan relevan</li>
              <li>Berkontribusi positif bagi pembangunan kota dan bangsa</li>
            </ol>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection