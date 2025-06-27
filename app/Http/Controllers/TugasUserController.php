<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\TugasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TugasUserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $tugas = Tugas::latest()->get();

        // Tandai setiap tugas apakah sudah dikumpulkan user ini
        foreach ($tugas as $item) {
            $item->sudah_dikumpulkan = $item->pengumpulan()
                ->where('user_id', $userId)
                ->exists();
        }

        return view('tugas_user.index', compact('tugas'));
    }

    public function show(Tugas $tugas)
    {
        $pengumpulan = TugasUser::where('user_id', Auth::id())
            ->where('id_tugas', $tugas->id_tugas)
            ->first();

        return view('tugas_user.show', compact('tugas', 'pengumpulan'));
    }

    public function kumpul(Tugas $tugas)
    {
        $pengumpulan = TugasUser::where('user_id', Auth::id())
            ->where('id_tugas', $tugas->id_tugas)
            ->first();

        return view('tugas_user.kumpul', compact('tugas', 'pengumpulan'));
    }

    public function store(Request $request, Tugas $tugas)
    {
        $request->validate([
            'file_jawaban' => 'required|file|mimes:pdf,docx,pptx,jpg,jpeg,png,zip|max:5120'
        ]);

        $path = $request->file('file_jawaban')->store('jawaban', 'public');

        TugasUser::create([
            'id_tugas' => $tugas->id_tugas,
            'user_id' => Auth::id(),
            'file_jawaban' => $path,
        ]);

        return redirect()->route('tugas-user.kumpul', $tugas->id_tugas)
            ->with('success', 'Tugas berhasil dikumpulkan.');
    }

    public function destroy(TugasUser $tugasUser)
    {
        if ($tugasUser->user_id !== Auth::id()) {
            abort(403);
        }

        // Hapus file dari storage jika ada
        if ($tugasUser->file_jawaban && Storage::disk('public')->exists($tugasUser->file_jawaban)) {
            Storage::disk('public')->delete($tugasUser->file_jawaban);
        }

        $tugasUser->delete();

        return redirect()->back()->with('success', 'Pengumpulan tugas berhasil dihapus.');
    }
}
