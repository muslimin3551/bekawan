<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bekawan.my.id - <?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url() ?>/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><span class="fs-4">Bekawan.my.id</span></h1>
                    <!-- <img src="img/logo1.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#" class="nav-item nav-link" onclick="setActive(this)">Home</a>
                        <a href="#about" class="nav-item nav-link" onclick="setActive(this)">About</a>
                        <a href="#service" class="nav-item nav-link" onclick="setActive(this)">Service</a>
                        <a href="#Testimonial" class="nav-item nav-link" onclick="setActive(this)">Testimonial</a>
                        <a href="#Counselor" class="nav-item nav-link" onclick="setActive(this)">Counselor</a>
                        <a href="<?= base_url('/article') ?>" class="nav-item nav-link" onclick="setActive(this)">Article</a>
                        <a href="<?= base_url('/contact') ?>" class="nav-item nav-link" onclick="setActive(this)">Contact</a>
                    </div>
                    <a href="<?= base_url('/login') ?>" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3" style="background-color: #316064;border: 0;">Login</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Selamat datang di bekawan.my.id </h1>
                            <p class="text-white pb-3 animated zoomIn">Eksplor temanmu dimana pun dan kapanpun</p>
                            <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Membership</a>
                            <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid" src="<?= base_url("/img/output-onlinepngtools.png") ?>" alt="" style="background-color: transparent;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->



        <!-- About Start -->
        <section id="about">
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="section-title position-relative mb-4 pb-2">
                                <h6 class="position-relative text-success ps-4">About Us</h6>
                                <h2 class="mt-2">Kesepian dapat meningkatkan risiko kematian dini hingga 50 persen.</h2>
                            </div>
                            <p class="mb-4">Tanpa kamu sadari, kesepian selalu menghampirimu, maka dari itu ayo eksplor temanmu di bekawan.my.id, carilah temanmu, curahkan isi hatimu.</p>
                            <div class="d-flex align-items-center mt-4">
                                <a class="btn btn-success rounded-pill px-4 me-3" href="">Read More</a>
                                <a class="btn btn-outline-success btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-success btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-success btn-square me-3" href="https://instagram.com/bekawan.yuk?igshid=MmVlMjlkMTBhMg"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-success btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="img/about.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->


        <!-- Service Start -->
        <section id="service">
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                        <h2 class="mt-2">What Solutions We Provide</h2>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-home fa-2x"></i>
                                </div>
                                <h3 class="mb-3">Dekat</h3>
                                <p> Kamu bisa bercerita dengan kami selama 7 hari, ceritamu kami pastikan akan terjaga dengan baik. </p>
                                <h3>Rp 15.000</h3>
                                <a class="btn px-3 mt-auto mx-auto" href="">Membership</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-home fa-2x"></i>
                                </div>
                                <h3 class="mb-3"> Lebih Dekat</h3>
                                <p>Kamu bisa bercerita dengan kami selama 14 hari, ceritamu kami pastikan akan terjaga dengan baik.</p>
                                <h3>Rp 20.000</h3>
                                <a class="btn px-3 mt-auto mx-auto" href="">Membership</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-home fa-2x"></i>
                                </div>
                                <h3 class="mb-3">Sangat Dekat</h3>
                                <p> Kamu bisa bercerita dengan kami selama 30 hari, ceritamu kami pastikan akan terjaga dengan baik. </p>
                                <h3>Rp 30.000</h3>
                                <a class="btn px-3 mt-auto mx-auto" href="">Membership</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service End -->


        <!-- Testimonial Start -->
        <section id="Testimonial">
            <div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative ps-4 text-info">Testimony</h6>
                </div>
                <div class="container py-5 px-lg-5">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p>Tidak perlu terburu-buru. Tidak perlu bersinar. Tidak perlu menjadi siapa pun kecuali diri sendiri.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">Virginia Woolf</h6>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p>Tidak ada seorangpun yang bisa kembali ke masa lalu dan memulai awal yang baru lagi. Tapi semua orang bisa memulai hari ini dan membuat akhir yang baru.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">Maria Robinson</h6>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p>Mengahabiskan waktu hari ini untuk mengeluh terhadap hari kemarin akan membuat hari esok lebih baik.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">Ds</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial End -->


        <!-- Team Start -->
        <section id="Counselor">
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="position-relative d-inline text-success ps-4">Our Counselor</h6>
                        <h2 class="mt-2">Meet Our Team Counselor</h2>
                    </div>
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <img class="img-fluid rounded w-100" src="<?= base_url("/img/Desti Lawulan Sa'bani.png") ?>" alt="">
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="fw-bold m-0">Desti Lawulan Sa'bani</h5>
                                    <small>Counselor</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="team-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <img class="img-fluid rounded w-100" src="<?= base_url("/img/Muhammad Suta Wijaya.png") ?>" alt="">
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="fw-bold m-0">Muhammad Suta Wijaya</h5>
                                    <small>Counselor</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <img class="img-fluid rounded w-100" src="<?= base_url('/img/Nabila Azzahra Putri.png') ?>" alt="">
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="fw-bold m-0">Nabila Azzahra Putri</h5>
                                    <small>Counselor</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="team-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <img class="img-fluid rounded w-100" src="<?= base_url("/img/Sayidati Shabrina Seno.png") ?>" alt="">
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="fw-bold m-0">Sayidati Shabrina Seno</h5>
                                    <small>Counselor</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="team-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-square text-success bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <img class="img-fluid rounded w-100" src="<?= base_url("/img/Syaima Fikya Nabilah.png") ?>" alt="">
                                </div>
                                <div class="px-4 py-3">
                                    <h5 class="fw-bold m-0">Syaima Fikya Nabilah</h5>
                                    <small>Counselor</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Alamat kampus: Jl. Ciwaru Raya, Cipare, Kec. Serang, Kota Serang, Banten 42117</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+622543204321</p>
                        <p><i class="fa fa-envelope me-3"></i>humas@untirta.ac.id</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Popular Link</h5>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Services</a>
                    </div>
                    <div class="col-md-6 col-lg-3">

                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Receive the latest information by entering your email below.</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-success fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Bekawan.my.id</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>/js/main.js"></script>
</body>
<script>
    function setActive(element) {
        // Remove "active" class from all links
        var links = document.querySelectorAll('.nav-item.nav-link');
        links.forEach(function(link) {
            link.classList.remove('active');
        });

        // Add "active" class to the clicked link
        element.classList.add('active');
    }
</script>

</html>