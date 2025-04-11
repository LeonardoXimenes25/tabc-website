<!-- Slick Slider CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<div class="profile-slider-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Profil Hamba Tuhan & Majelis</h2>

        <div class="profile-slider">
            <!-- Item 1 -->
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. John Doe" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. John Doe</h5>
                    <p class="text-muted small mb-0">Gembala Sidang</p>
                </div>
            </div>
            
            <!-- Item 2 -->
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>
            
            <!-- Item 3-8 -->
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Majelis A" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Bpk. Michael</h5>
                    <p class="text-muted small mb-0">Ketua Majelis</p>
                </div>
            </div>
            
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Majelis B" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Ibu Sarah</h5>
                    <p class="text-muted small mb-0">Sekretaris</p>
                </div>
            </div>
            
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Majelis C" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Bpk. David</h5>
                    <p class="text-muted small mb-0">Bendahara</p>
                </div>
            </div>
            
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Majelis D" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Ibu Rachel</h5>
                    <p class="text-muted small mb-0">Anggota Majelis</p>
                </div>
            </div>
            
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Majelis E" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Daniel</h5>
                    <p class="text-muted small mb-0">Pendeta Wilayah</p>
                </div>
            </div>
            
            <div class="px-2">
                <div class="profile-item text-center p-3">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Majelis F" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Ibu Deborah</h5>
                    <p class="text-muted small mb-0">Ketua Komisi</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .profile-slider-section {
        border-radius: 10px;
    }
    
    .profile-slider {
        margin: 0 -10px;
    }
    
    .profile-item {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .profile-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .profile-image-wrapper {
        width: 120px;
        height: 120px;
        border: 3px solid #f0f0f0;
        border-radius: 50%;
        padding: 5px;
    }
    
    .profile-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    
    /* Slick Arrow Customization */
    .slick-prev, 
    .slick-next {
        width: 40px;
        height: 40px;
        z-index: 1;
    }
    
    .slick-prev:before, 
    .slick-next:before {
        font-size: 40px;
        color: #4e73df;
    }
    
    .slick-prev {
        left: -15px;
    }
    
    .slick-next {
        right: -15px;
    }
</style>

<!-- jQuery & Slick JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.profile-slider').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            dots: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>