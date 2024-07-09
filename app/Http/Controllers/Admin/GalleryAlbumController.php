<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AlbumDataTable;
use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class GalleryAlbumController extends Controller
{
    public function index(AlbumDataTable $dataTable)
    {
        return $dataTable->render('admin.gallery-album.index');
    }

    public function create()
    {
        return view('admin.gallery-album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200']
        ]);

        $galleryAlbum = new Album();
        $galleryAlbum->name = $request->name;
        $galleryAlbum->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.gallery-album.index');
    }

    public function edit($id)
    {
        $galleryAlbum = Album::findOrFail($id);
        return view('admin.gallery-album.edit', compact('galleryAlbum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200']
        ]);

        $galleryAlbum = Album::findOrFail($id);
        $galleryAlbum->name = $request->name;
        $galleryAlbum->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.gallery-album.index');
    }

    public function destroy($id)
    {
        $galleryAlbum = Album::findOrFail($id);
        $galleryAlbum->delete();
    }
}
