@extends('frontend.layouts.app')

@section('title', 'Galery')

@section('content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>{{ $gallerySectionSetting?->title }}</strong>
                    </h2>
                    <p class="gsap-reveal-hero">{!! $gallerySectionSetting?->sub_title !!}</p>

                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff" stroke-width="2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($albums as $album)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration == 1 ? '0' : $loop->iteration . '00' }}">
                        <div class="post-entry">
                            <a href="{{ route('show.album', $album->id) }}" class="thumb"><img
                                    src="{{ asset('assets/img/icon-album.png') }}" alt="image" class="img-fluid" /></a>
                            <h3 class="text-center"><a href="{{ route('show.album', $album->id) }}">{{ $album->name }}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
