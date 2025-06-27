<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\TugasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasUserController extends Controller
{
    public function index()
    {
        $tugas = Tugas::latest()->get();
        return view('tugas_user.index', compact('tugas'));
    }

    public function show(Tugas $tugas)
    {
        return view('tugas_user.show', compact('tugas'));
    }

    // Form untuk upload tugas
    public function kumpul(Tugas $tugas)
    {
        $pengumpulan = TugasUser::where('user_id', Auth::id())
            ->where('id_tugas', $tugas->id)
            ->first();

        return view('tugas_user.kumpul', compact('tugas', 'pengumpulan'));
    }

    public function store(Request $request, $tugas)
    {
        $tugas = Tugas::findOrFail($tugas); // ubah dari ID ke model

        $request->validate([
            'file_jawaban' => 'required|file|mimes:pdf,docx,pptx,jpg,jpeg,png,zip|max:5120'
        ]);

        $path = $request->file('file_jawaban')->store('jawaban', 'public');

        TugasUser::create([
            'id_tugas' => $tugas->id,
            'user_id' => Auth::id(),
            'file_jawaban' => $path,
        ]);

        return redirect()->route('tugas-user.kumpul', $tugas->id)
            ->with('success', 'Tugas berhasil dikumpulkan.');
    }


    public function destroy(TugasUser $tugasUser)
    {
        if ($tugasUser->user_id !== Auth::id()) {
            abort(403);
        }

        $tugasUser->delete();

        return redirect()->back()->with('success', 'Pengumpulan tugas berhasil dihapus.');
    }
}
