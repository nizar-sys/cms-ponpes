<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\KrfImageDataTable;
use App\Http\Controllers\Controller;
use App\Models\Krfimage;
use Illuminate\Http\Request;

class KrfImageController extends Controller
{
    public function index(KrfImageDataTable $dataTables)
    {
        return $dataTables->render('admin.krfimage.index');
    }

    public function create()
    {
        $krfimage = Krfimage::all();
        return view('admin.krfimage.create',compact('krfimage'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required','image','max:50000'],
        ]);

        $imagePath = handleUpload('image');

        $krfimage = new Krfimage();
        $krfimage->image = $imagePath;
        $krfimage->save();

        toastr()->success('Photo Created Successfully !','Success'); 

        return redirect()->route('admin.krfimage.index');
    }
    
    public function edit($id)
    {
        $krfimage = Krfimage::findOrFail($id);
        return view('admin.krfimage.edit', compact('krfimage'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image','max:50000'],
        ]);

        $krfimage =  Krfimage::findOrFail($id);

        $imagePath = handleUpload('image', $krfimage);

        $krfimage->image = (!empty($imagePath) ? $imagePath : $krfimage->image);
        $krfimage->save();

        toastr()->success('Photo Updated Successfully !','Success'); 

        return redirect()->route('admin.krfimage.index');
    }
    
    public function destroy($id)
    {
        $krfimage = Krfimage::findOrFail($id);
        deleteFileIfExist($krfimage->image);
        $krfimage->delete(); 
    }
}
