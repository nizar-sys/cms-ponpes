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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'nik' => 'required|unique:teachers|numeric',
            'ttl' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:teachers,email',
            'educational' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
        ], [
            'image.required' => 'Foto guru wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'name.required' => 'Nama guru wajib diisi.',
            'nik.required' => 'NIK guru wajib diisi.',
            'nik.unique' => 'NIK guru sudah terdaftar.',
            'ttl.required' => 'Tempat Tanggal Lahir wajib diisi.',
            'no_telp.required' => 'No. Telepon wajib diisi.',
            'email.required' => 'Email guru wajib diisi.',
            'email.unique' => 'Email guru sudah terdaftar.',
            'educational.required' => 'Pendidikan terakhir wajib diisi.',
            'role.required' => 'Jabatan guru wajib diisi.',
            'expertise.required' => 'Keahlian guru wajib diisi.',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = handleUpload('image');
        } else {
            $imagePath = null;
        }

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->nik = $request->nik;
        $teacher->ttl = $request->ttl;
        $teacher->no_telp = $request->no_telp;
        $teacher->email = $request->email;
        $teacher->educational = $request->educational;
        $teacher->role = $request->role;
        $teacher->expertise = $request->expertise;
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
