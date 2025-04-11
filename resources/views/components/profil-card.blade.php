<div class="profile-slider-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Profil Hamba Tuhan & Majelis</h2>

        <div class="profile-slider">
            <!-- Item 1 -->
            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. John Doe" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. John Doe</h5>
                    <p class="text-muted small mb-0">Gembala Sidang</p>
                </div>
            </div>
            
            <!-- Item 2-8 -->
            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>

            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>

            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>

            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>

            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>

            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>

            <div class="px-2">
                <div class="profile-item text-center p-3 h-100">
                    <div class="profile-image-wrapper mx-auto mb-3">
                        <img src="{{asset('images/church-hero.jpg')}}" alt="Pdt. Jane Smith" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="fw-bold mb-1">Pdt. Jane Smith</h5>
                    <p class="text-muted small mb-0">Wakil Gembala</p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    .profile-slider-section {
        background-color: #f8f9fa;
    }
    
    .profile-item {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    
    .profile-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .profile-image-wrapper {
        width: 150px;
        height: 150px;
        border: 3px solid #e9ecef;
        border-radius: 50%;
        padding: 5px;
    }
    
    .profile-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
</style>

<script>
    $(document).ready(function(){
        $('.profile-slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: { slidesToShow: 3 }
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 2 }
                },
                {
                    breakpoint: 576,
                    settings: { slidesToShow: 1 }
                }
            ]
        });
    });
</script>