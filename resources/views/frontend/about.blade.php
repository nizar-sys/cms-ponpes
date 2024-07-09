@extends('frontend.layouts.app')

@section('title', 'About')

@section('content')

    <div class="untree_co-section pb-0" id="about-section">
        <div class="container" style="margin-top: 6rem">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-7 mx-auto text-center author-wrap">
                    <img src="{{ asset($about?->image) }}" alt="Image" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;" />
                    <h3 class="text-black h5 font-weight-bold mb-2 gsap-reveal-hero">
                        {{ $about?->title }}
                    </h3>
                    <p class="gsap-reveal-hero" data-aos-delay="200" id="typer-title"></p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="gsap-reveal-hero mt-2">
                        {!! $about?->description !!}
                    </div>

                    {{-- <p class="gsap-reveal-hero text-center">
                        <a href="{{ $about?->resume }}" target="_blank" class="btn btn-outline-black">Hire Me</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/typify.js@1.1.9/dist/typify.min.js"></script>
    <script>
        var typerTitles = @json($typerTitles);
        var title = [];
        typerTitles.forEach(function(typerTitle) {
            title.push(typerTitle.title);
        });
    </script>
    <script>
        const typingText = Typify('#typer-title', {
            text: title,
        });
    </script>
@endpush
