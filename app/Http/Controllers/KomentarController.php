<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    // Tampilkan semua komentar
    public function index()
    {
        $komentar = Komentar::with(['materi', 'user'])->get();
        return response()->json($komentar);
    }

    // Simpan komentar baru
    public function store(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
            'materi_id' => 'required|exists:materi,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $komentar = Komentar::create($request->only(['isi_komentar', 'materi_id', 'user_id']));

        // 🔁 Tambahkan redirect kalau request bukan dari AJAX
        if (! $request->expectsJson()) {
            return redirect()->route('materi.show', $request->materi_id)->with('success', 'Komentar berhasil ditambahkan.');
        }

        // Kalau memang request dari API / AJAX
        return response()->json([
            'message' => 'Komentar berhasil ditambahkan',
            'data' => $komentar
        ], 201);
    }


    // Tampilkan komentar berdasarkan ID
    public function show($id)
    {
        $komentar = Komentar::with(['materi', 'user'])->findOrFail($id);
        return response()->json($komentar);
    }

    // Update komentar berdasarkan ID
    public function update(Request $request, $id)
    {
        $komentar = Komentar::findOrFail($id);

        $request->validate([
            'isi_komentar' => 'sometimes|required|string',
            'materi_id' => 'sometimes|required|exists:materi,id',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $komentar->update($request->only(['isi_komentar', 'materi_id', 'user_id']));

        return response()->json([
            'message' => 'Komentar berhasil diperbarui',
            'data' => $komentar
        ]);
    }

    // Hapus komentar
    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $user = Auth::user();

        // Guru bisa hapus semua komentar
        // Murid hanya bisa hapus komentar miliknya sendiri
        // Pastikan akses ke atribut string, bukan relasi
        $roleName = is_string($user->role) ? $user->role : (is_object($user->role) && property_exists($user->role, 'name') ? $user->role->name : null);

        if (strtolower($roleName) !== 'guru' && $user->id !== $komentar->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }

        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}
