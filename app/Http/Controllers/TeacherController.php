<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'nik' => 'required|unique:teachers',
            'role' => 'required',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'nik.required' => 'NIK guru wajib diisi.',
            'role.required' => 'Jabatan guru wajib diisi.',
            'nik.unique' => 'NIK guru sudah terdaftar.',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = handleUpload('image');
        }


        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->nik = $request->nik;
        $teacher->role = $request->role;
        $teacher->image = $imagePath;
        $teacher->save();

        toastr()->success('Data guru berhasil ditambahkan.');
        return redirect(route('admin.teachers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:teachers,nik,' . $teacher->id,
            'role' => 'required',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'nik.required' => 'NIK guru wajib diisi.',
            'role.required' => 'Jabatan guru wajib diisi.',
            'nik.unique' => 'NIK guru sudah terdaftar.',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = handleUpload('image', $teacher);
            $teacher->image = $imagePath;
        }

        $teacher->name = $request->name;
        $teacher->nik = $request->nik;
        $teacher->role = $request->role;
        $teacher->save();

        toastr()->success('Data guru berhasil diperbarui.');
        return redirect(route('admin.teachers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        deleteFileIfExist($teacher->image);
        $teacher->delete();

        toastr()->success('Data guru berhasil dihapus.');
        return redirect(route('admin.teachers.index'));
    }
}
