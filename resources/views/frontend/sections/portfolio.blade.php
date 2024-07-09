<section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{ $portfolioTitle->title }}</h2>
            <p>
                {!! $portfolioTitle->sub_title !!}
            </p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li class="filter-active" data-filter="*">All Projects</li>
                    @foreach ($portfolioCategories as $category)
                        <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($portfolioItems as $item)
                <div data-aos-delay="200" class="col-lg-4 col-md-6 portfolio-item {{ $item->category->slug }}">
                    <div class="portfolio-wrap">
                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ asset($item->image) }}">
                        <div class="portfolio-info">
                            <h4>{{ $item->title }}</h4>
                            <p>{!! Str::limit(strip_tags($item->description), 100) !!}</p>
                            <div class="portfolio-links">
                                <a href="{{ asset($item->image) }}" data-gallery="portfolioGallery"
                                    class="portfokio-lightbox" title="{{ $item->title }}"><i
                                        class="bi bi-plus"></i></a>
                                <a target="__blank" href="{{$item->website}}"
                                    title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
