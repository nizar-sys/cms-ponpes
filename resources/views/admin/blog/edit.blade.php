@extends('admin.layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ url('/dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Berita</h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Data Berita</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Poster</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Judul
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Berita</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="category">
                                        <option>Select</option>
                                        @foreach ($categories as $category)
                                        <option {{ $category->id == $blog->category ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi/Konten</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description" class="summernote">{!! $blog->description !!}</textarea>
                                </div>
                            </div> 

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#image-preview').css({
            'background-image': 'url("{{ asset($blog->image) }}")'
            , 'background-size': 'cover'
            , 'background-position': 'center center'
        })
    });

</script>
@endpush
