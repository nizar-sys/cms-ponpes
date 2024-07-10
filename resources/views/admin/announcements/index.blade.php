@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Pengumuman</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pengumuman</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.announcements.create') }}" class="btn btn-success">
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
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($announcements as $announcement)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $announcement->title }}</td>
                                            <td>{!! $announcement->content !!}</td>
                                            <td>{{ $announcement->author->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                            class="fas fa-trash"></i></button>
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
