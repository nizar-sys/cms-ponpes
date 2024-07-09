@php
    $colors = ['red', 'orange', 'green', 'purple', 'pink', 'blue'];
    shuffle($colors); // Acak urutan warna
@endphp
<section id="services" class="services">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>My Services</h2>
            <p>What I offer</p>
        </header>

        <div class="row gy-4">
            @php $usedColorsCount = []; @endphp
            @foreach ($services as $service)
                @php
                    $color = $colors[$loop->index % count($colors)];
                    while (in_array($color, $usedColorsCount)) {
                        $color = $colors[$loop->index % count($colors)];
                    }
                    $usedColorsCount[] = $color;
                @endphp
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box {{ $color }}">
                        <i class="ri-discuss-line icon"></i>
                        <h3>{{ $service->name }}</h3>
                        <p>{!! $service->description !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</section>
