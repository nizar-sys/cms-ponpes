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
                <div class="col-lg-4 mb-4">
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img">
                                    <img src="{{ asset($teacher->image) }}" alt="image-guru" class="img-fluid" />
                                </div>
                                <div class="content">
                                    <p>Nama : {{ $teacher->name }}</p>
                                    <p>NIK : {{ $teacher->nik }}</p>
                                    <p>Jabatan : {{ $teacher->role }}</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="#teacherModal{{ $teacher->id }}">
                                        Lihat Detail
                                    </button>
                                </div>
                            </article>
                        </div>
                    </section>
                    <!-- /Blog Details Section -->
                </div>

                <!-- Modal -->
                <div class="modal fade" id="teacherModal{{ $teacher->id }}" tabindex="-1"
                    aria-labelledby="teacherModalLabel{{ $teacher->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="teacherModalLabel{{ $teacher->id }}">Detail Guru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ asset($teacher->image) }}" alt="image-guru"
                                        class="img-fluid rounded-circle" style="max-width: 150px;" />
                                </div>
                                <p><strong>Nama:</strong> {{ $teacher->name }}</p>
                                <p><strong>NIK:</strong> {{ $teacher->nik }}</p>
                                <p><strong>Tempat Tanggal Lahir:</strong> {{ $teacher->ttl }}</p>
                                <p><strong>No. Telepon:</strong> {{ $teacher->no_telp }}</p>
                                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                                <p><strong>Pendidikan:</strong> {{ $teacher->educational }}</p>
                                <p><strong>Jabatan:</strong> {{ $teacher->role }}</p>
                                <p><strong>Keahlian:</strong> {{ $teacher->expertise }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
