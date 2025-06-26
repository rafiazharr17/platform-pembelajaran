<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = Materi::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $materi = $query->latest()->get(); // Atau ->paginate(9) jika kamu ingin pagination

        return view('materi.index', compact('materi'));
    }


    public function create()
    {
        return view('materi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi',
            'file_type' => 'nullable|in:image,video',
            'thumbnail' => 'nullable|image'
        ]);

        $materi = new Materi();
        $materi->user_id = Auth::id();
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('materi', 'public');
            $materi->file_path = $path;
            $materi->file_type = $request->file_type;
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $materi->thumbnail_path = $thumbnailPath;
        }

        $materi->save();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show(Materi $materi)
    {
        return view('materi.show', compact('materi'));
    }

    public function edit(Materi $materi)
    {
        return view('materi.edit', compact('materi'));
    }

    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi',
            'file_type' => 'nullable|in:image,video',
            'thumbnail' => 'nullable|image'
        ]);

        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;

        if ($request->hasFile('file')) {
            if ($materi->file_path) {
                Storage::disk('public')->delete($materi->file_path);
            }
            $path = $request->file('file')->store('materi', 'public');
            $materi->file_path = $path;
            $materi->file_type = $request->file_type;
        }

        if ($request->hasFile('thumbnail')) {
            if ($materi->thumbnail_path) {
                Storage::disk('public')->delete($materi->thumbnail_path);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $materi->thumbnail_path = $thumbnailPath;
        }

        $materi->save();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Materi $materi)
    {
        if ($materi->file_path) {
            Storage::disk('public')->delete($materi->file_path);
        }
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
