<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\GalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Album; 
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(GalleryDataTable $dataTables)
    {
        return $dataTables->render('admin.gallery.index');
    }

    public function create()
    {
        $albums = Album::all();
        return view('admin.gallery.create',compact('albums'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','image','max:50000'],
            'title' => ['required'] ,
        ]);

        $imagePath = handleUpload('image');

        $gallery = new Gallery();
        $gallery->image = $imagePath;
        $gallery->title = $request->title;
        $gallery->save();

        toastr()->success('Gallery Created Successfully !','Success'); 

        return redirect()->route('admin.gallery.index');
    }
    
    public function edit($id)
    {
        $albums = Album::all();
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit',compact('albums','gallery'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image','max:50000'],
            'title' => ['required'] ,
        ]);

        $gallery =  Gallery::findOrFail($id);

        $imagePath = handleUpload('image', $gallery);

        $gallery->image = (!empty($imagePath) ? $imagePath : $gallery->image);
        $gallery->title = $request->title;
        $gallery->save();

        toastr()->success('Gallery Updated Successfully !','Success'); 

        return redirect()->route('admin.gallery.index');
    }
    
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        deleteFileIfExist($gallery->image);
        $gallery->delete(); 
    }
}
