<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>About Me</h2>
        </header>
        <div class="row gx-0">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>"Who Are You?"</h3>
                    <h2>{{ $about->title }}</h2>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        {!! $about->description !!}
                    </div>
                    <div class="text-center text-lg-start">
                        <a href="{{ route('admin.resume.download') }}"
                            class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                            <i class="bi bi-arrow-down"></i>
                            <span>Download Resume</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset($about->image) }}" class="img-fluid w-75" alt="">
            </div>

        </div>
    </div>

</section><!-- End About Section -->
