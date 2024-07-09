@php
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $generalSetting = \App\Models\GeneralSetting::first();
    $seoSetting = \App\Models\SeoSetting::first();
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <title>{{ @$seoSetting?->title }} | @yield('title')</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset($generalSetting?->favicon) }}" />
    <meta name="description" content="{{ @$seoSetting?->description }}">
    <meta name="keywords" content="{{ @$seoSetting?->keywords }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=PT+Mono&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('untree_minimal') }}/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    @stack('styles')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="100">

    <div class="lines-wrap">
        <div class="lines-inner">
            <div class="lines"></div>
        </div>
    </div>
    <!-- END lines -->

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('untree_minimal') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/popper.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/aos.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/wave-animate.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/circle-progress.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/imagesloaded.pkgd.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/TweenMax.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/ScrollMagic.min.js"></script>
    <script src="{{ asset('untree_minimal') }}/js/scrollmagic.animation.gsap.min.js"></script>


    <script src="{{ asset('untree_minimal') }}/js/custom.js"></script>

    @stack('scripts')
</body>

</html>
