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
                            <h4>Data Guru</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.teachers.create') }}" class="btn btn-success">
                                    Tambah Data
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teacher->nik }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->role }}</td>
                                            <td>
                                                <img src="{{ asset($teacher->image) }}" alt="image-guru"
                                                    class="img-fluid" style="width: 100px; height: 100px;" />
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
