<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\KomentarController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Dashboard (semua role login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Admin: Kelola user
Route::middleware(['auth', RoleMiddleware::class . ':Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
});

// ✅ Guru: Kelola materi
Route::middleware(['auth', RoleMiddleware::class . ':Guru'])->group(function () {
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/{materi}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::put('/materi/{materi}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{materi}', [MateriController::class, 'destroy'])->name('materi.destroy');
});

// ✅ Untuk Guru: CRUD tugas
Route::middleware(['auth', RoleMiddleware::class . ':Guru'])->group(function () {
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::delete('/tugas/{tugas}', [TugasController::class, 'destroy'])->name('tugas.destroy');
});

// ✅ Semua user login bisa lihat materi & kelola profil
Route::middleware(['auth'])->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/{materi}', [MateriController::class, 'show'])->name('materi.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ CRUD komentar
    Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
    Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    Route::get('/komentar/{id}', [KomentarController::class, 'show'])->name('komentar.show');
    Route::put('/komentar/{id}', [KomentarController::class, 'update'])->name('komentar.update');
    Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
});

// ✅ Auth bawaan Laravel
require __DIR__.'/auth.php';
