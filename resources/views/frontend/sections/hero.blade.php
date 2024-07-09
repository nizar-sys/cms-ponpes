<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h3 class="typer-title" data-aos="fade-up" data-aos-delay="0.2s">
                    {{$typerTitles->first()->title}}
                </h3>
                <h1 data-aos="fade-up">{{ $hero->title }}</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">{{ $hero->sub_title }}.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="{{ $hero->btn_url }}"
                            target="__blank" rel="noopener noreferrer"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>{{ $hero->btn_text }}</span>

                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ $hero->image ? asset($hero->image) : asset('newasset/img/hero-img.png') }}" class="img-fluid w-75" alt="">
            </div>
        </div>
    </div>
</section>