<!-- resources/views/partials/profile-highlight.blade.php -->
<section class="profile-highlight py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="display-4 mb-4">Profil Gereja</h2>
                <p class="lead mb-5">Kenali lebih dekat gereja kami melalui sejarah, visi, misi, dan struktur organisasi kami.</p>
            </div>
        </div>
        <div class="row">
            <!-- Card Profil 1 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/sejarah.jpg') }}" class="card-img-top" alt="Sejarah Gereja">
                    <div class="card-body">
                        <h5 class="card-title">Sejarah Gereja</h5>
                        <p class="card-text">Temukan perjalanan sejarah gereja kami dan bagaimana Tuhan telah menuntun kami hingga saat ini.</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Card Profil 2 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/visi-misi.jpg') }}" class="card-img-top" alt="Visi dan Misi Gereja">
                    <div class="card-body">
                        <h5 class="card-title">Visi & Misi</h5>
                        <p class="card-text">Kami berkomitmen untuk menjadi gereja yang melayani dan memberitakan Injil ke seluruh dunia.</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Card Profil 3 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/struktur.jpg') }}" class="card-img-top" alt="Struktur Organisasi">
                    <div class="card-body">
                        <h5 class="card-title">Struktur Organisasi</h5>
                        <p class="card-text">Kenali lebih dekat pengurus gereja kami dan bagaimana kami bekerja sama untuk melayani jemaat.</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
