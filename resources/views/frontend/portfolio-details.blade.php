@extends('frontend.layouts.app')

@section('title', 'Detail Portfolio')

@section('content')
    <div class="untree_co-section untree_co-section-4 pb-0" id="portfolio-section">
        <div class="container">
            <div class="portfolio-single-wrap unslate_co--section" id="portfolio-single-section">

                <div class="portfolio-single-inner">
                    <h2 class="heading-portfolio-single-h2 text-black">{{ $portfolio->title }}</h2>

                    <div class="row mb-5 align-items-stretch">

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <img src="{{ $portfolio->image }}" alt="Image" class="img-fluid">
                        </div>

                        <div class="col-lg-6 pl-lg-5">
                            <div class="row mb-3">
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Project Date</span>
                                        <span class="detail-val">{{ \Carbon\Carbon::now()->parse($portfolio->created_at)->format('F d, Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Category</span>
                                        <span class="detail-val">{{ $portfolio->category->name }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Client</span>
                                        <span class="detail-val">{{ $portfolio->client }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Visit</span>
                                        <span class="detail-val"><a target="__blank" href="{{ $portfolio->website }}">{{ $portfolio->website }}/</a></span>
                                    </div>
                                </div>
                            </div>

                            {!! $portfolio->description !!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
