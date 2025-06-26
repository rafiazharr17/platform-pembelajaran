<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::latest()->get();
        return view('tugas.index', compact('tugas'));
    }

    public function create()
    {
        return view('tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function destroy(Tugas $tugas)
    {
        $tugas->delete();
        return back()->with('success', 'Tugas berhasil dihapus.');
    }
}

