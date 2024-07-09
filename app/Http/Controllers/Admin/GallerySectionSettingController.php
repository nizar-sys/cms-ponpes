<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GallerySectionSetting;
use Illuminate\Http\Request;

class GallerySectionSettingController extends Controller
{
    public function index()
    {
        $gallery = GallerySectionSetting::first();
        return view('admin.gallery-setting.index', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000']
        ]);

        GallerySectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->back();
    }
}
