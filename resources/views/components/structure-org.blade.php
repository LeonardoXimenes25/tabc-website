<section class="mb-5">
    <div class="d-flex align-items-center mb-4">
      <h2 class="h4 mb-0">
        Estrutura Organizasaun
      </h2>
    </div>
    
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <!-- Organizational Chart -->
        <div class="org-chart">
          <!-- Level 1 - Ketua Majelis (Highest Authority) -->
          @php
          $xefeMajelis = \App\Models\User::where('position', 'xefe majelis')->first();
            @endphp
            @if ($xefeMajelis)
            <div class="org-level text-center mb-4">
              <div class="org-node mx-auto bg-primary text-white p-3 rounded" style="width: 280px;">
                <h3 class="h5 mb-1">Xefe Majelis</h3>
                <p class="mb-0 small">Senor {{ $xefeMajelis->name }}</p>
              </div>
              <div class="org-connector-vertical mx-auto"></div>
            </div>
            @endif
                
          <!-- Level 2 - Wakil Ketua -->
          <div class="org-level text-center mb-4">
            <div class="org-node mx-auto bg-success text-white p-3 rounded" style="width: 260px;">
              <h3 class="h5 mb-1">Vice Majelis</h3>
              {{-- <p class="mb-0 small">Senor. {{ $xefeMajelis->name }}</p> --}}
            </div>
            <div class="org-connector-vertical mx-auto"></div>
          </div>
          
          <!-- Level 3 - Sekretaris & Bendahara -->
          <div class="org-level text-center d-flex justify-content-center gap-3 mb-4">
            <div class="org-node bg-info text-white p-3 rounded" style="width: 240px;">
              <h3 class="h5 mb-1">Sekretaria 1</h3>
              <p class="mb-0 small">senora Ika</p>
            </div>
            <div class="org-node bg-info text-white p-3 rounded" style="width: 240px;">
              <h3 class="h5 mb-1">Sekretaria 2</h3>
              <p class="mb-0 small">Ibu Betty</p>
            </div>
            <div class="org-node bg-warning text-white p-3 rounded" style="width: 240px;">
              <h3 class="h5 mb-1">Tesoreira 1</h3>
              <p class="mb-0 small">Ibu Lay Oi Fa</p>
            </div>
            <div class="org-node bg-warning text-white p-3 rounded" style="width: 240px;">
              <h3 class="h5 mb-1">Tesoreira 2</h3>
              <p class="mb-0 small">Bpk. Sarah Yap</p>
            </div>
          </div>
          
          <!-- Level 4 - Bidang Pelayanan -->
          <div class="org-level text-center d-flex justify-content-center gap-3">
            <div class="org-node bg-light p-3 rounded border" style="width: 220px;">
              <h3 class="h5 mb-1">Bidang Pemuda</h3>
              <p class="mb-0 small">Sdr. Andrew Pratama</p>
            </div>
            <div class="org-node bg-light p-3 rounded border" style="width: 220px;">
              <h3 class="h5 mb-1">Bidang Ibadah</h3>
              <p class="mb-0 small">Sdri. Jessica Nathania</p>
            </div>
            <div class="org-node bg-light p-3 rounded border" style="width: 220px;">
              <h3 class="h5 mb-1">Bidang Sarana</h3>
              <p class="mb-0 small">Bpk. Robert Chen</p>
            </div>
            <div class="org-node bg-light p-3 rounded border" style="width: 220px;">
              <h3 class="h5 mb-1">Bidang Sarana</h3>
              <p class="mb-0 small">Bpk. Robert Chen</p>
            </div>
          </div>
        </div>
        
        <!-- Catatan Struktur -->
        <div class="mt-4 p-3 bg-light rounded">
          <p class="small text-muted mb-0">
            <i class="bi bi-info-circle"></i><strong>Estrutura Prebisterial:</strong> 
            Xefe Majelis mak sai lideransa boot iha organisasaun igreja. 
            Maromak nia atan halao ministeriu iha seksaun espiritual ho kordenasaun husi majelis.
          </p>
        </div>
      </div>
    </div>
  </section>