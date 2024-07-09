@extends('frontend.layouts.app')

@section('title', 'Services')

@section('content')
    <div class="untree_co-section pb-0" id="services-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>{{ $serviceSetting?->title }}</strong>
                    </h2>
                    <p class="gsap-reveal-hero">
                        {!! $serviceSetting?->sub_title !!}
                    </p>
                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($services as $serv)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4">
                        <div class="service text-center">
                            <div class="gsap-reveal-hero mb-3">
                                <span class="icon-service"><img src="{{ asset($serv->image) }}" alt="Image"
                                        class="img-fluid" /></span>
                            </div>
                            <h3 class="gsap-reveal-hero">{{ $serv->name }}</h3>
                            <p class="gsap-reveal-hero">
                                {!! $serv->description !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
