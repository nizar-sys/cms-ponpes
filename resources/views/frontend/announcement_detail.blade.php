@extends('frontend.layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('/ponpes') }}/assets/img/page-title-bg.webp)">
        <div class="container position-relative">
            <h1>Detail Pengumuman</h1>
            <p>{{ $announcement->title }}</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}">Home</a></li>
                    <li class="current">Detail Pengumuman</li>
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
                            <h2 class="title">{{ $announcement->title }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-person"></i>
                                        <a href="{{ $announcement->id }}">{{ $announcement->author->name }}</a>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <a href="{{ $announcement->id }}"><time
                                                datetime="2020-01-01">{{ $announcement->created_at }}</time></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End meta top -->

                            <div class="content">
                                {!! $announcement->content !!}
                            </div>
                        </article>
                    </div>
                </section>
                <!-- /Blog Details Section -->
            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <div class="recent-posts-widget-2 widget-item">
                        <h3 class="widget-title">Pengumuman Lainnya</h3>

                        @foreach ($announcementsLatest as $item)
                            <div class="post-item">
                                <h4>
                                    <a href="{{ route('announcements.show', $item->id) }}">{{ $item->title }}</a>
                                </h4>
                                <time datetime="2020-01-01">{{ $item->created_at->format('d M, Y') }}</time>
                            </div>
                        @endforeach

                    </div>
                    <!--/Recent Posts Widget 2 -->
                </div>
            </div>
        </div>
    </div>
@endsection
