@extends('frontend.layouts.app')

@section('title', 'Blog Detail')

@section('content')
    <div class="untree_co-section untree_co-section-4 pb-0" id="portfolio-section">
        <div class="container">
            <div class="portfolio-single-wrap unslate_co--section" id="portfolio-single-section">

                <div class="portfolio-single-inner">
                    <h2 class="heading-portfolio-single-h2 text-black">{{ $blog->title }}</h2>

                    <div class="row justify-content-between mb-5">

                        <div class="col-lg-12 mb-5 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ asset($blog->image) }}" alt="Image" class="img-fluid">
                                </div>
                            </div>

                        </div>

                        <div class="col-12 my-5">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="detail-v1">
                                        <span class="detail-label">Blog Date</span>
                                        <span
                                            class="detail-val">{{ \Carbon\Carbon::now()->parse($blog->created_at)->format('F d, Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="detail-v1">
                                        <span class="detail-label">Category</span>
                                        <span class="detail-val">{{ $blog->getCategory->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {!! $blog->description !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>All Journey</strong>
                    </h2>
                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff" stroke-width="2"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestPosts as $blog)
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
