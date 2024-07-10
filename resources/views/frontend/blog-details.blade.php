@extends('frontend.layouts.app')

@section('title', 'Detail Berita')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('/ponpes') }}/assets/img/page-title-bg.webp)">
        <div class="container position-relative">
            <h1>Detail Berita</h1>
            <p>{{ $berita->title }}</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}">Home</a></li>
                    <li class="current">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <section id="blog-details" class="blog-details section">
                    <div class="container">
                        <article class="article">
                            <div class="post-img">
                                <img src="{{ asset($berita->image) }}" alt="" class="img-fluid" />
                            </div>

                            <h2 class="title">{{ $berita->title }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <a href="{{ route('show.blog', $berita->id) }}"><time
                                                datetime="2020-01-01">{{ $berita->created_at }}</time></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End meta top -->

                            <div class="content">
                                {!! $berita->description !!}
                            </div>
                        </article>
                    </div>
                </section>
                <!-- /Blog Details Section -->
            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">
                        <h3 class="widget-title">Kategori</h3>
                        <ul class="mt-3">
                            @foreach ($kategoriBerita as $kategori)
                                <li>
                                    <a href="#">{{ $kategori->name }}
                                        <span>({{ $kategori->blogs_count }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--/Categories Widget -->

                    <div class="recent-posts-widget-2 widget-item">
                        <h3 class="widget-title">Berita Lainnya</h3>

                        @foreach ($latestPosts as $post)
                            <div class="post-item">
                                <h4>
                                    <a href="blog-details.html">{{ $post->title }}</a>
                                </h4>
                                <time datetime="2020-01-01">{{ $post->created_at->format('M d, Y') }}</time>
                            </div>
                        @endforeach

                    </div>
                    <!--/Recent Posts Widget 2 -->
                </div>
            </div>
        </div>
    </div>
@endsection
