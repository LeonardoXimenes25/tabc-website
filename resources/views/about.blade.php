@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- Page Header -->
      <div class="text-center mb-5">
        <h1 class="display-4">Tentang Kami</h1>
        <p class="lead">Mengenal lebih dalam gereja kami</p>
      </div>

      <!-- Church History -->
      <section class="mb-5">
        <div class="d-flex align-items-center mb-4">
          <h2 class="h4 mb-0">
            <i class="bi bi-book me-2"></i>Sejarah Gereja
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
      <section class="mb-5">
        <div class="d-flex align-items-center mb-4">
          <h2 class="h4 mb-0">
            <i class="bi bi-diagram-3 me-2"></i>Struktur Organisasi
          </h2>
        </div>
        
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <!-- Organizational Chart -->
            <div class="org-chart">
              <!-- Level 1 - Gembala Sidang -->
              <div class="org-level text-center mb-4">
                <div class="org-node mx-auto bg-primary text-white p-3 rounded" style="width: 240px;">
                  <h3 class="h5 mb-1">Gembala Sidang</h3>
                  <p class="mb-0 small">Pdt. Dr. Jonathan Susanto</p>
                </div>
                <div class="org-connector-vertical mx-auto"></div>
              </div>
              
              <!-- Level 2 - Ketua Majelis -->
              <div class="org-level text-center mb-4">
                <div class="org-node mx-auto bg-success text-white p-3 rounded" style="width: 240px;">
                  <h3 class="h5 mb-1">Ketua Majelis</h3>
                  <p class="mb-0 small">Bpk. Richard Tanuwijaya</p>
                </div>
                <div class="org-connector-vertical mx-auto"></div>
                
                <!-- Wakil Majelis (indented under Ketua) -->
                <div class="org-sublevel mt-3">
                  <div class="org-node mx-auto bg-info text-white p-3 rounded" style="width: 220px;">
                    <h3 class="h5 mb-1">Wakil Majelis</h3>
                    <p class="mb-0 small">Ibu Sarah Limantara</p>
                  </div>
                  <div class="org-connector-vertical mx-auto"></div>
                </div>
              </div>
              
              <!-- Level 3 - Sekretaris & Bendahara -->
              <div class="org-level d-flex justify-content-center gap-3 mb-4">
                <div class="org-node bg-warning p-3 rounded" style="width: 200px;">
                  <h3 class="h5 mb-1">Sekretaris 1</h3>
                  <p class="mb-0 small">Sdr. Daniel Kurniawan</p>
                </div>
                <div class="org-node bg-warning p-3 rounded" style="width: 200px;">
                  <h3 class="h5 mb-1">Sekretaris 2</h3>
                  <p class="mb-0 small">Sdri. Michelle Chandra</p>
                </div>
                <div class="org-node bg-danger text-white p-3 rounded" style="width: 200px;">
                  <h3 class="h5 mb-1">Bendahara 1</h3>
                  <p class="mb-0 small">Ibu Lisa Wijaya</p>
                </div>
                <div class="org-node bg-danger text-white p-3 rounded" style="width: 200px;">
                  <h3 class="h5 mb-1">Bendahara 2</h3>
                  <p class="mb-0 small">Bpk. Kevin Hartono</p>
                </div>
              </div>
              
              <!-- Level 4 - Seksi -->
              <div class="org-level d-flex justify-content-center gap-3">
                <div class="org-node bg-light p-3 rounded border" style="width: 180px;">
                  <h3 class="h5 mb-1">Seksi Pemuda</h3>
                  <p class="mb-0 small">Sdr. Andrew Pratama</p>
                </div>
                <div class="org-node bg-light p-3 rounded border" style="width: 180px;">
                  <h3 class="h5 mb-1">Seksi Oikumene</h3>
                  <p class="mb-0 small">Ibu Deborah Susilo</p>
                </div>
                <div class="org-node bg-light p-3 rounded border" style="width: 180px;">
                  <h3 class="h5 mb-1">Seksi Ibadah</h3>
                  <p class="mb-0 small">Sdri. Jessica Nathania</p>
                </div>
                <div class="org-node bg-light p-3 rounded border" style="width: 180px;">
                  <h3 class="h5 mb-1">Seksi Maintenance</h3>
                  <p class="mb-0 small">Bpk. Robert Chen</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Vision & Mission -->
      <section>
        <div class="d-flex align-items-center mb-4">
          <h2 class="h4 mb-0">
            <i class="bi bi-bullseye me-2"></i>Visi & Misi
          </h2>
        </div>
        
        <!-- Vision -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">Visi</h3>
          </div>
          <div class="card-body">
            <p class="lead">"Menjadi gereja yang relevan dan menjadi berkat bagi kota dan bangsa."</p>
          </div>
        </div>
        
        <!-- Mission -->
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">Misi</h3>
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