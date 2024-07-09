<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'image' => ['required', 'max:3000', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName =  rand() . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $imageName);

            $imagePath = "/uploads/" . $imageName;
        }

        Hero::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        toastr()->success('Data Banner berhasil ditambah', 'Congrats');
        return redirect()->route('admin.hero.index');
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
        $hero = Hero::find($id);
        return view('admin.hero.edit', compact('hero'));
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
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'image' => ['max:3000', 'image'],
        ]);

        $hero = Hero::find($id);

        if ($request->hasFile('image')) {
            if ($hero && File::exists(public_path($hero->image))) {
                File::delete(public_path($hero->image));
            }

            $image = $request->file('image');
            $imageName =  rand() . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $imageName);

            $imagePath = "/uploads/" . $imageName;
        }

        Hero::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
            ]
        );
        toastr()->success('Data Banner berhasil diubah', 'Congrats');
        return redirect(route('admin.hero.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Hero::find($id);
        if ($hero && File::exists(public_path($hero->image))) {
            File::delete(public_path($hero->image));
        }
        $hero->delete();
        toastr()->success('Data Banner berhasil dihapus', 'Congrats');
        return redirect(route('admin.hero.index'));
    }
}
