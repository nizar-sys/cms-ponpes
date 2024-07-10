@extends('frontend.layouts.app')

@section('title', 'About')

@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('/ponpes') }}/assets/img/hero-image1.jpeg)">
        <div class="container position-relative">
            <h1>Tentang Kami</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}">Home</a></li>
                    <li class="current">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- About 3 Section -->
    <section id="about-3" class="about-3 section">
        <div class="container">
            <div class="row gy-4 justify-content-between align-items-center">
                <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                    <img src="{{ asset($about->image) }}" alt="Image" class="img-fluid" />
                </div>
                <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="content-title mb-4">{{ $about->title }}</h2>
                    <p class="mb-4">
                        {!! $about->description !!}
                    </p>
                    <p><a href="{{ asset($about->resume) }}" download target="_blank" class="btn-cta">Download Brosur</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
