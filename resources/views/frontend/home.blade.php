@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="untree_co-section pb-5" id="home-section">
        <div class="container mt-0">
            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <h1 class="heading gsap-reveal-hero mb-3"><strong>{{ $hero?->title }}</strong></h1>
                    <h2 class="subheading gsap-reveal-hero mb-4">
                        {!! $hero?->sub_title !!}
                    </h2>
                    {{-- <p class="gsap-reveal-hero"><a href="{{ $hero?->btn_url }}" target="_blank"
                            class="btn btn-outline-black">{{ $hero?->btn_text }}</a></p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section-5 pb-0" id="portfolio-section">
        <div class="container mt-0">
            {{-- <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <h1 class="heading gsap-reveal-hero mb-3" style="color: #000">
                        <strong>{{ $portfolioTitle?->title }}</strong>
                    </h1>
                    <h3 class="heading gsap-reveal-hero mb-3" style="color: #000">
                        <strong>{{ $portfolioTitle?->title }} <sup>*latest</sup></strong>
                    </h3>
                    <h2 class="subheading gsap-reveal-hero mb-2"
                        style="font-family: 'PT Mono', monospace; font-size: 18px; color: #000">
                        {{ $portfolioTitle?->sub_title }}
                    </h2>
                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff" stroke-width="2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="loader-portfolio-wrap">
                    <div class="loader-portfolio"></div>
                </div>
            </div>
            <div id="portfolio-single-holder"></div> --}}

            <div class="portfolio-wrapper">
                <div id="posts" class="row">
                    @foreach ($portfolioItems as $porto)
                        <div class="item web branding col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
                            <a href="{{ route('show.portfolio', $porto->id) }}"
                                class="portfolio-item isotope-item gsap-reveal-img">
                                <div class="overlay">
                                    <span class="wrap-icon icon-link2"></span>
                                    <div class="portfolio-item-content">
                                        <h3>{{ $porto->title }}</h3>
                                        <p>{{ $porto->category->name }}</p>
                                    </div>
                                </div>
                                <img src="{{ asset($porto->image) }}" class="lazyload img-fluid" alt="Images" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>{{ $blogTitle?->title }}</strong>
                    </h2>
                    <p class="gsap-reveal-hero">{{ $blogTitle?->sub_title }}</p>

                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff" stroke-width="2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->iteration == 1 ? '0' : $loop->iteration . '00' }}">
                        <div class="post-entry">
                            <a href="{{ route('show.blog', $blog->id) }}" class="thumb"><img src="{{ asset($blog->image) }}"
                                    alt="image" class="img-fluid" /></a>
                            <h3><a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <div class="post-meta">
                                {{ \Carbon\Carbon::now()->parse($blog->created_at)->format('M d, Y') }} by <a href="#">{{ $blog->getCreatedBy->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
