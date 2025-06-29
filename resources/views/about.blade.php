@extends('layouts.app')

@section('title', 'Konaba-Ami | TABCTL')

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
            <p>
              Igreja The Alliance Bible Church Timor Leste (TABC-TL), iha tempu Indonesia ho naran Gereja 
              Kebangunan Kalam Allah di Timor Timur (GKKA) hari iha dia 28 Julu 1990 no hola parte husi igreja
              Gereja Kristus Kalam Allah di Indonesia (GKKAI). Maibe tamba mudansa politika iha ne'ebe Timor Leste sai nasaun independente no iha soberanu rasik maka iha reuniaun Majelis iha tinan 2020, naran igreja muda no traduz ba iha lian ingles sai THE ALLIANCE BIBLE CHURCH di TIMOR LESTE (TABC-TL) to ohin loron
            </p>
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
            <p class="lead">"Sai Igreja ne'ebe hadomi Nai Maromak no kompaneiru inklui sai eskolante no sasin Kristus hahu husi Timor Leste to mundu tomak"</p>
          </div>
        </div>
        
        <!-- Mission -->
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">Misaun</h3>
          </div>
          <div class="card-body">
            <p>
              menjalankan misi Allah bagi dan melalui gereja-Nya, dalam bentuk persekutuan, pelayanan, 
              dan kesaksian secara tertib dan teratur berdasarkan sistem Gereja Presbiterial, yang digariskan 
              dalam Tata Gereja (Tager) dan Peraturan Internal Gereja (Pering) TABC-TL. 
            </p>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection