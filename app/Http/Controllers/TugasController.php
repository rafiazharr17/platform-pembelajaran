<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::latest()->get(); // return collection of model
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
            'deadline' => 'nullable|date',
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function show(Tugas $tugas)
    {
        // Ambil semua file yang dikumpulkan beserta user-nya
        $pengumpulan = $tugas->pengumpulan()->with('user')->get();

        return view('tugas.show', compact('tugas', 'pengumpulan'));
    }

    public function edit(Tugas $tugas)
    {
        return view('tugas.edit', compact('tugas'));
    }

    public function update(Request $request, Tugas $tugas)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'nullable|date',
        ]);

        $tugas->update($request->only(['judul', 'deskripsi', 'deadline']));

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Tugas $tugas)
    {
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
