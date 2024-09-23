<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Planificala - Plataforma de Planificación Curricular</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="<?= base_url('assets/lib/animate/animate.min.css') ?>"/>
        <link href="<?= base_url('assets/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
            <div class="container">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <div class="border-end border-primary pe-3">
                                <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Encuentra una Ubicación</a>
                            </div>
                            <div class="ps-3">
                                <a href="mailto:info@planificala.cl" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>info@planificala.cl</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex border-end border-primary pe-3">
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light"> 
                    <a href="#" class="navbar-brand p-0">
                        <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> Planificala</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                            <a href="index.html" class="nav-item nav-link active">Inicio</a>
                            <a href="about.html" class="nav-item nav-link">Sobre Nosotros</a>
                            <a href="service.html" class="nav-item nav-link">Servicios</a>
                            <a href="blog.html" class="nav-item nav-link">Blog</a>
                            <a href="contact.html" class="nav-item nav-link">Contacto</a>
                        </div>
                    </div>
                    <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                        <a href="tel:+56912345678" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                            <i class="fa fa-phone-alt fa-2x"></i>
                        </a>
                        <div class="d-flex flex-column ms-3">
                            <span>Llame a nuestros expertos</span>
                            <a href="tel:+56912345678"><span class="text-dark">Gratis: +56 9 1234 5678</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <!-- Slide 1 -->
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-start">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">Bienvenido(a) a</h4>
                                    <h1 class="display-1 text-white mb-4">Planificala.cl</h1>
                                    <p class="mb-5 fs-5">
                                        Simplifica tus planificaciones y obtén más tiempo para lo que importa. Nuestra plataforma te ofrece herramientas eficientes para que puedas enfocarte en lo esencial: ¡enseñar!
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Ver Video</a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Descubre Más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 animated fadeInRight">
                                <div class="carousel-img" style="object-fit: cover;">
                                    <img src="<?php echo base_url('assets/img/carousel-2.png') ?>" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                            <div class="col-lg-5 animated fadeInLeft">
                                <div class="carousel-img">
                                    <img src="<?php echo base_url('assets/img/carousel-2.png') ?>" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 animated fadeInRight">
                                <div class="text-sm-center text-md-end">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">Optimiza tu Tiempo</h4>
                                    <h1 class="display-1 text-white mb-4">Planifica con Eficiencia y Gana Tiempo Libre</h1>
                                    <p class="mb-5 fs-5">
                                        Planificala.cl te ayuda a organizar tu trabajo docente de manera ágil y efectiva, liberándote de las tareas repetitivas para que puedas disfrutar de tu tiempo libre.
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Ver Video</a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Descubre Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Feature Start -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Nuestras Características</h4>
                    <h1 class="display-4 mb-4">Mejora tu Proceso de Planificación</h1>
                    <p class="mb-0">En Planificala.cl nos enfocamos en proporcionar herramientas que ahorran tiempo, optimizan la enseñanza y facilitan la planificación curricular de los docentes.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="far fa-handshake fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Herramientas de Confianza</h4>
                            <p class="mb-4">Te proporcionamos las mejores soluciones para que puedas confiar en tus planificaciones.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Aprende Más</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fa fa-dollar-sign fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Reembolso Garantizado</h4>
                            <p class="mb-4">Si no estás satisfecho con el servicio, ofrecemos opciones flexibles de reembolso.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Aprende Más</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fa fa-bullseye fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Planes Flexibles</h4>
                            <p class="mb-4">Diseña tus planificaciones de acuerdo con tus necesidades y las de tus estudiantes.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Aprende Más</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fa fa-headphones fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Soporte 24/7</h4>
                            <p class="mb-4">Siempre estamos disponibles para resolver cualquier problema que puedas tener.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Aprende Más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->

        <!-- About Start -->
        <div class="container-fluid bg-light about pb-5">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-item-content bg-white rounded p-5 h-100">
                            <h4 class="text-primary">Sobre Nosotros</h4>
                            <h1 class="display-4 mb-4">Mejora Continua en Planificación Curricular</h1>
                            <p>En Planificala.cl creemos que los docentes deben tener acceso a herramientas que faciliten su labor diaria, haciéndola más efectiva y permitiéndoles enfocarse en lo que más importa: sus estudiantes.</p>
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="#">Más Información</a>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-white rounded p-5 h-100">
                            <img src="<?php echo base_url('assets/img/about-1.png') ?>" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-xl-9">
                        <h3 class="text-white mb-4"><i class="fab fa-slack me-3"></i> Planificala</h3>
                        <p class="text-white mb-4">Facilitamos la planificación curricular, permitiendo que los docentes se enfoquen en lo más importante: enseñar y disfrutar de su tiempo.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/lib/wow/wow.min.js') ?>"></script>
        <script src="<?= base_url('assets/lib/easing/easing.min.js') ?>"></script>
        <script src="<?= base_url('assets/lib/waypoints/waypoints.min.js') ?>"></script>
        <script src="<?= base_url('assets/lib/counterup/counterup.min.js') ?>"></script>
        <script src="<?= base_url('assets/lib/lightbox/js/lightbox.min.js') ?>"></script>
        <script src="<?= base_url('assets/lib/owlcarousel/owl.carousel.min.js') ?>"></script>

        <!-- Template Javascript -->
        <script src="<?= base_url('assets/js/main.js') ?>"></script>
    </body>

</html>
