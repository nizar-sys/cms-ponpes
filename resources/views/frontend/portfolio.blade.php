@extends('frontend.layouts.app')

@section('title', 'My Works')

@section('content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>{{ $portfolioSetting?->title }}</strong>
                    </h2>
                    <p class="gsap-reveal-hero">{!! $portfolioSetting?->sub_title !!}</p>

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
            <div id="portfolio-single-holder"></div>

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
@endsection
