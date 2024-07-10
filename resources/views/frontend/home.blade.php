@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach ($heroes as $hero)
                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                    <img src="{{ asset($hero->image) }}" alt="" />
                    <div class="carousel-container">
                        <h2>{{ $hero->title }}</h2>
                        {!! $hero->description !!}
                    </div>
                </div>
            @endforeach

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Services Section -->
    <section id="fasilitas" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $fasilitasSection?->title }}</h2>
            <p>
                {!! $fasilitasSection?->sub_title !!}
            </p>
        </div>
        <!-- End Section Title -->
        <div class="content">
            <div class="container">
                <div class="row g-0">
                    @foreach ($fasilitas as $f)
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <img src="{{ asset($f->image) }}" class="img-fluid" />
                                <div class="service-item-icon"></div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">{{ $f->name }}</h3>
                                    {!! $f->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /Services Section -->

    <!-- About Section -->
    <section id="pengumuman" class="about section">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4 text-center">Pengumuman</h2>
                    </div>
                </div>
                <div class="row my-5">
                    @foreach ($pengumuman as $p)
                        <div class="col-lg-4 mb-4 d-flex align-items-start">
                            <div class="w-100">
                                <h4 class="m-0 h5 text-white">{{ $p->title }}</h4>
                                <p class="text-white opacity-50">{{ \Illuminate\Support\Str::limit($p->content, 30) }}</p>
                                <a href="{{ route('announcements.show', $p->id) }}" class="readmore stretched-link">
                                    <span style="color: white">Read More</span><i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Services 2 Section -->
    <section id="galeri" class="services-2 section dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri Ponpes {{ \App\Models\SeoSetting::first()?->title }}</h2>
            <p>Galeri</p>
        </div>
        <!-- End Section Title -->

        <div class="services-carousel-wrap">
            <div class="container">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".js-custom-next",
                            "prevEl": ".js-custom-prev"
                        },
                        "breakpoints": {
                            "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 40
                            },
                            "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 40
                            }
                        }
                        }
                    </script>
                    <button class="navigation-prev js-custom-prev">
                        <i class="bi bi-arrow-left-short"></i>
                    </button>
                    <button class="navigation-next js-custom-next">
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                    <div class="swiper-wrapper">
                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <a href="#">
                                            <span class="service-item-category">{{ $gallery->title }}</span>
                                            <h2 class="service-item-title"></h2>
                                        </a>
                                    </div>
                                    <img src="{{ asset($gallery->image) }}" alt="Image" class="img-fluid" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Services 2 Section -->

    <!-- Recent Posts Section -->
    <section id="berita" class="recent-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $pengaturanBerita?->title }}</h2>
            <p>{!! $pengaturanBerita?->sub_title !!}</p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-5">
                @foreach ($beritaTerbaru as $berita)
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset($berita->image) }}" class="img-fluid" alt="" />
                                <span class="post-date">{{ $berita->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">{{ $berita->title }}</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i>
                                        <span class="ps-2">{{ $berita->getCategory->name }}</span>
                                    </div>
                                </div>

                                <hr />

                                <a href="{{ route('show.blog', $berita->id) }}" class="readmore stretched-link"><span>Read
                                        More</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Recent Posts Section -->
@endsection
