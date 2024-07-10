@extends('frontend.layouts.app')

@section('title', 'All Journey')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('/ponpes') }}/assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Berita</h1>
            <p>
                Home
                /
                Berita</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Berita</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Berita Posts 2 Section -->
    <section id="blog-posts-2" class="blog-posts-2 section">

        <div class="container">
            <div class="row gy-4">
                @foreach ($blogs as $berita)
                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset($berita->image) }}" class="img-fluid" alt="">
                            </div>

                            <div class="mt-3"></div>

                            <div class="meta d-flex align-items-end">
                                <span class="post-date">{{ $berita->created_at->format('d F') }}</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">{{ $berita->getCategory->name }}</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">{{ $berita->title }}</h3>
                                <a href="{{ route('show.blog', $berita->id) }}" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </article>
                    </div>
                @endforeach
            </div>
        </div>

    </section><!-- /Blog Posts 2 Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

        <div class="container">
            <div class="d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>

    </section><!-- /Blog Pagination Section -->

@endsection
