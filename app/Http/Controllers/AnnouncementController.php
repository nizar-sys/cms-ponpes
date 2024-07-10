<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();

        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->id(),
        ]);

        toastr()->success('Pengumuman berhasil dibuat!');

        return redirect(route('admin.announcements.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        $announcementsLatest = Announcement::latest()
            ->where('id', '!=', $announcement->id)
            ->take(5)
            ->get();

        return view('frontend.announcement_detail', compact('announcement', 'announcementsLatest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        toastr()->success('Pengumuman berhasil diperbarui!');

        return redirect(route('admin.announcements.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        toastr()->success('Pengumuman berhasil dihapus!');

        return redirect(route('admin.announcements.index'));
    }
}
