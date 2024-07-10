@extends('frontend.layouts.app')

@section('title', 'About')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('/ponpes') }}/assets/img/page-title-bg.webp)">
        <div class="container position-relative">
            <h1>Data Guru</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/', []) }}">Home</a></li>
                    <li class="current">Data Guru</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-lg-4">
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img">
                                    <img src="{{ asset($teacher->image) }}" alt="image-guru"
                                        class="img-fluid" />
                                </div>
                                <div class="content">
                                    <p>Nama : {{ $teacher->name }}</p>
                                    <p>NIK : {{ $teacher->nik }}</p>
                                    <p>Jabatan : {{ $teacher->role }}</p>
                                </div>
                            </article>
                        </div>
                    </section>
                    <!-- /Blog Details Section -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
