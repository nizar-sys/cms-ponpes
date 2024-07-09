@extends('frontend.layouts.app')

@section('title', 'Kelas Riset Film')

@section('content')

    <div class="untree_co-section pb-0" id="home-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <h1 class="heading gsap-reveal-hero mb-3"><strong>{{ $krf?->title }}</strong></h1>
                    <h2 class="subheading gsap-reveal-hero mb-4">
                        {!! $krf?->sub_title !!}
                    </h2> 
                    <img src="{{ asset($krf?->image) }}" alt="Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" />
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section untree_co-section-4 padding-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto contents ">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="custom-block row justify-content-center" data-aos="fade-up">
                                <!-- <h2 class="section-title text-black">Accordion</h2> -->
                                <p class="gsap-reveal-hero">
                                    {!! $krf?->description !!}<br />
                                </p>
                            </div> <!-- END .custom-block -->
                        </div> <!-- /.col-lg-6 -->
                    
                        <div class="col-lg-6">
                            <div class="custom-block" data-aos="fade-up">
                                <!-- <h2 class="section-title text-black">Gallery</h2> -->
                                <div class="row gutter-v2 gallery">
                                    @foreach ($krfimage as $i)
                                    <div class="col-4">
                                        <a href="{{ asset($i?->image) }}" class="gal-item" data-fancybox="gal"><img src="{{ asset($i?->image) }}" alt="Image" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover;" ></a>
                                    </div>
                                    @endforeach
                                </div>
                            </div> <!-- END .custom-block -->
                        </div> <!-- /.col-lg-6 -->
                    </div> <!-- /.row -->    
                </div>
            </div>
        </div>
    </div>

@endsection
