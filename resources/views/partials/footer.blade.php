<footer class="bg-dark text-white pt-5 pb-4" style="border-top: 5px solid #0d6efd; position: relative;">
    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="btn btn-primary rounded-circle shadow" style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        display: none;
        z-index: 99;
    ">
        <i class="fas fa-arrow-up"></i>
    </button>

    <div class="container">
        <div class="row">
            <!-- Bagian Tentang Gereja -->
            <div class="col-md-5 mb-4">
                <h5 class="text-uppercase mb-4" style="color: #0d6efd;">
                    <i class="fas fa-church me-2"></i> The Alliance Bible Church Timor Leste
                </h5>
                <p class="text-white">
                    <i class="fas fa-cross me-2" style="color: #0d6efd;"></i> 
                    Sebuah komunitas orang percaya yang berkomitmen untuk menyembah Tuhan, membangun sesama.
                </p>
            </div>

            <!-- Kontak Info -->
            <div class="col-md-3 mb-4">
                <h5 class="text-uppercase mb-4" style="color: #0d6efd;">
                    <i class="fas fa-address-book me-2"></i> Kontaktu Ami
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="fas fa-map-marker-alt me-2" style="color: #0d6efd;"></i> 
                        <span>Avenida Audian, Dili Timor Leste</span>
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-phone-alt me-2" style="color: #0d6efd;"></i> 
                        <span>+670 123 456 789</span>
                    </li>
                    <li class="mb-3">
                        <a href="tabctl1990@gmail.com" class="text-white"><i data-feather="mail" class="me-2" style="color: #0d6efd;"></i>tabctl1990@gmail.com</a>
                    </li>
                </ul>
            </div>

            <!-- Jam Pelayanan -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase mb-4" style="color: #0d6efd;">
                    <i class="fas fa-clock me-2"></i> Oras Ministeriu
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="fas fa-sun me-2" style="color: #0d6efd;"></i> 
                        <strong>Misa Domingu:</strong> 08:00 - 10:00
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-sun me-2" style="color: #0d6efd;"></i> 
                        <strong>Eskola Dominika:</strong> 10:00 - 11:30
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-bible me-2" style="color: #0d6efd;"></i> 
                        <strong>Kultu Orasaun Kuarta:</strong> 19:00 - 21:00
                    </li>
                </ul>
            </div>
        </div>

        <hr class="mb-4" style="border-color: rgba(230,184,0,0.5);">

        <!-- Copyright & Social Media -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">
                    <i class="far fa-copyright"></i> {{ date('Y') }} The Alliance Bible Church Timor Leste. 
                    <span class="d-block d-md-inline">All rights reserved.</span>
                </p>
            </div>
            <div class="col-md-6 text-md-end mt-3">
                <p style="display: inline-block" class="me-3">Follow Ami: </p>
                <a href="#" class="text-white me-3 icon-hover"><i data-feather="youtube"></i></a>
                <a href="#" class="text-white me-3 icon-hover"><i data-feather="instagram"></i></a>
                <a href="#" class="text-white me-3 icon-hover"><i class="fab fa-whatsapp fa-lg"></i></a>
            </div>
        </div>
    </div>
</footer>

<script>
// Scroll to Top Functionality
window.addEventListener('scroll', function() {
    const scrollButton = document.getElementById('scrollToTop');
    if (window.pageYOffset > 300) {
        scrollButton.style.display = 'block';
    } else {
        scrollButton.style.display = 'none';
    }
});

document.getElementById('scrollToTop').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>

<style>
/* Hover Effects */
.icon-hover {
    transition: all 0.3s ease;
}
.icon-hover:hover {
    color: #0d6efd !important;
    transform: translateY(-3px);
}

#scrollToTop {
    transition: all 0.3s ease;
}
#scrollToTop:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
}
</style>