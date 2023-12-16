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
    <style>
        .article-list {
            list-style: none;
            padding: 0;
        }

        .article-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .article-image {
            width: 100;
            /* Adjust the width as needed */
            height: 100px;
            /* Adjust the height as needed */
            margin-right: 20px;
            object-fit: cover;
        }

        .article-content {
            flex: 1;
        }
    </style>
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
                        <a href="<?= base_url('/#') ?>" class="nav-item nav-link" onclick="setActive(this)">Home</a>
                        <a href="<?= base_url('/#about') ?>" class="nav-item nav-link" onclick="setActive(this)">About</a>
                        <a href="<?= base_url('/#service') ?>" class="nav-item nav-link" onclick="setActive(this)">Service</a>
                        <a href="<?= base_url('/#Testimonial') ?>" class="nav-item nav-link" onclick="setActive(this)">Testimonial</a>
                        <a href="<?= base_url('/#Counselor') ?>" class="nav-item nav-link" onclick="setActive(this)">Counselor</a>
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
                            <img class="img-fluid" src="<?= base_url("/img/output-onlinepngtools.png") ?>" alt="" style="background-color: transparent;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="col-lg-12">
                            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                                <h2 class="mt-2"><?= $article['title'] ?></h2>
                            </div>
                            <div class="text-center">
                                <p style="margin-right: 10px;">
                                    Posted by <?= get_counselor_name($article['konselor_id']) ?>
                                    on <?= date('Y-m-d', strtotime($article['created_at'])) ?>
                                    <i class="fa fa-eye"></i> <?= $article['views'] ?>
                                </p>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="0.3s">
                                <img src="<?= base_url('/uploads/article/') . $article['photo'] ?>" alt="Article Image" class="img-fluid w-100 mb-12">
                                <p><?= $article['description'] ?></p>
                            </div>
                            <p></p>
                            <hr>
                            <a href="<?= site_url('article/like/' . $article['id']) ?>"><i class="fa fa-thumbs-up"></i></a> <?= $article['likes'] ?> likes
                            <p></p>
                            <p style="font-weight: 500;color: #316064;">#<?= $article['tag'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

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