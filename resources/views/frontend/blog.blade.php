@extends('frontend.layouts.app')

@section('title', 'All Journey')

@section('content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>{{ $blogSetting?->title }}</strong>
                    </h2>
                    <p class="gsap-reveal-hero">{!! $blogSetting?->sub_title !!}</p>

                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff" stroke-width="2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration == 1 ? '0' : $loop->iteration . '00' }}">
                        <div class="post-entry">
                            <a href="{{ route('show.blog', $blog->id) }}" class="thumb"><img
                                    src="{{ asset($blog->image) }}" alt="image" class="img-fluid" /></a>
                            <h3><a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <div class="post-meta">
                                {{ \Carbon\Carbon::now()->parse($blog->created_at)->format('M d, Y') }} by <a
                                    href="#">{{ $blog->getCreatedBy->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
