@extends('frontend.layouts.app')

@section('title', 'Contact Me')

@section('content')
    <div class="untree_co-section" id="contact-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-center mx-auto">
                    <h2 class="section-heading gsap-reveal-hero mb-0">
                        <strong>{{ $contactSetting?->title }}</strong>
                    </h2>
                    <p class="gsap-reveal-hero">{!! $contactSetting?->sub_title !!}</p>

                    <div class="wave gsap-reveal-hero">
                        <svg>
                            <path d="M10,10 L50,100 L90,50" stroke="#0389ff"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('contact') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control" name="name" placeholder="Fullname" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email address" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                    placeholder="Write your message..."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <input type="submit" class="btn btn-black" value="Send Message" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div id="map">
                        <iframe
                            src="{{ $contactSetting?->map_url }}"
                            frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
