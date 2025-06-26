<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Admin: Kelola user & role
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
});

// ✅ Guru: Buat/Edit/Hapus Materi
Route::middleware(['auth', 'role:Guru'])->group(function () {
    Route::resource('materi', MateriController::class)->except(['index', 'show']);
    Route::resource('tugas', TugasController::class)->except(['show', 'edit', 'update']);
});


// ✅ Semua user login bisa melihat materi
Route::middleware(['auth'])->group(function () {
    Route::resource('materi', MateriController::class)->only(['index', 'show']);

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
