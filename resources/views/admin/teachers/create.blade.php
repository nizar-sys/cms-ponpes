@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Guru</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Guru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Nama Guru
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        NIK
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nik" class="form-control"
                                            value="{{ old('nik') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Tempat Tanggal Lahir (TTL)
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="ttl" class="form-control"
                                            value="{{ old('ttl') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        No. Telepon
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="no_telp" class="form-control"
                                            value="{{ old('no_telp') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Email
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Pendidikan Terakhir
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="educational" class="form-control"
                                            value="{{ old('educational') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Jabatan
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="role" class="form-control"
                                            value="{{ old('role') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Keahlian
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="expertise" class="form-control"
                                            value="{{ old('expertise') }}">
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
