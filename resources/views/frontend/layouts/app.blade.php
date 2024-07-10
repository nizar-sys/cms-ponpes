<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pondok Pesantren</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('/ponpes') }}/assets/img/favicon.png" rel="icon" />
    <link href="{{ asset('/ponpes') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/ponpes') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('/ponpes') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('/ponpes') }}/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="{{ asset('/ponpes') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="{{ asset('/ponpes') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('/ponpes') }}/assets/css/main.css" rel="stylesheet" />
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/', []) }}" class="logo d-flex align-items-center">
                <img src="{{ asset('/ponpes') }}/assets/img/logo-pesantren.png" alt="ponpes" />
                <h1 class="sitename">Pondok Pesantren</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/', []) }}" class="active">Home</a></li>
                    <li><a href="{{ url('/', []) }}/about.html">Tentang Kami</a></li>
                    <li><a href="{{ url('/', []) }}/#fasilitas">Fasilitas</a></li>
                    <li><a href="{{ url('/', []) }}data-guru.html">Data Guru</a></li>
                    <li><a href="{{ url('/', []) }}/#pengumuman">Pengumuman</a></li>
                    <li><a href="{{ url('/', []) }}/#galeri">Galeri</a></li>
                    <li><a href="{{ url('/', []) }}/#berita">Berita</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="{{ url('/', []) }}" class="logo d-flex align-items-center">
                            <span class="sitename">{namaAplikasi}</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>A108 Adam Street</p>
                            <p>New York, NY 535022</p>
                            <p class="mt-3">
                                <strong>Phone:</strong> <span>+1 5589 55488 55</span>
                            </p>
                            <p><strong>Email:</strong> <span>info@example.com</span></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <ul>
                            <li><a href="{{ url('/', []) }}" class="active">Home</a></li>
                            <li><a href="about.html">Tentang Kami</a></li>
                            <li><a href="#fasilitas">Fasilitas</a></li>
                            <li><a href="data-guru.html">Data Guru</a></li>
                            <li><a href="#pengumuman">Pengumuman</a></li>
                            <li><a href="#galeri">Galeri</a></li>
                            <li><a href="#berita">Berita</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>{namaAplikasi}</span></strong>. All Rights Reserved
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/ponpes') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/ponpes') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('/ponpes') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('/ponpes') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('/ponpes') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/ponpes') }}/assets/js/main.js"></script>
</body>

</html>
