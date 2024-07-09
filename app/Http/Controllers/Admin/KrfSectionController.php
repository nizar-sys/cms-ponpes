<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KrfSectionSetting;
use Illuminate\Http\Request;

class KrfSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $krf = KrfSectionSetting::first();
        return view('admin.krf.index', compact('krf'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $request->validate([
            'title' => ['required','max:200'],
            'sub_title' => ['required','max:200'],
            'description' => ['required', 'max:500000'],
            'image' => [ 'image' ,'max:500000']
        ]);

        $krf = KrfSectionSetting::first();
        $imagePath = handleUpload('image', $krf);

        KrfSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'image' => (!empty($imagePath) ? $imagePath : $krf->image)
            ]
        ); 
        toastr()->success ('updated Succesfully', 'Congrats');
        return redirect()->back();


    } 
    
    /* public function resumeDownload()
    {
        $krf = KrfSectionSetting::first();
        return response()->download(public_path($krf->resume));
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
