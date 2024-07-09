@extends('frontend.layouts.app')

@section('title', 'Galery')

@section('content')
    <div class="untree_co-section untree_co-section-4 padding-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto contents">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="custom-block" data-aos="fade-up">
                                <h2 class="section-title text-black">{{$album->name}}</h2>
                                <div class="row gutter-v2 gallery mt-3">
                                    @foreach ($album->images as $item)
                                        <div class="col-4">
                                            <a href="{{ asset($item->image) }}" class="gal-item" data-fancybox="gal"><img
                                                    src="{{ asset($item->image) }}" alt="Image" class="img-fluid"></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection