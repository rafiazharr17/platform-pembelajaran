<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Tugas;
use App\Models\Forum;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'materiCount' => Materi::count(),
            'tugasCount' => Tugas::count(),
            'recentMateri' => Materi::latest()->take(5)->get(),
            'recentTugas' => Tugas::latest()->take(5)->get(),
        ]);
    }
}
