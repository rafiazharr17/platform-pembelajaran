<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware;

// Halaman awal
Route::get('/', fn () => view('welcome'));

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Admin: Kelola user dan role
Route::middleware(['auth', RoleMiddleware::class . ':Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    });

// Guru: CRUD Materi
Route::middleware(['auth', RoleMiddleware::class . ':Guru'])->group(function () {
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/{materi}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::put('/materi/{materi}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{materi}', [MateriController::class, 'destroy'])->name('materi.destroy');
});

// Semua user login: lihat materi & profil
Route::middleware(['auth'])->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/{materi}', [MateriController::class, 'show'])->name('materi.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Guru: buat, edit, hapus tugas (diletakkan sebelum route show)
Route::middleware(['auth', RoleMiddleware::class . ':Guru'])->group(function () {
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{tugas}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/tugas/{tugas}', [TugasController::class, 'update'])->name('tugas.update');
    Route::delete('/tugas/{tugas}', [TugasController::class, 'destroy'])->name('tugas.destroy');
});

// Guru & Murid: lihat daftar tugas & detail
Route::middleware(['auth', RoleMiddleware::class . ':Guru,Murid'])->group(function () {
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');
});

// Murid: kumpulkan tugas
Route::middleware(['auth', RoleMiddleware::class . ':Murid'])
    ->prefix('tugas-user')
    ->name('tugas-user.')
    ->group(function () {
        Route::get('/', [TugasUserController::class, 'index'])->name('index');
        Route::get('/{tugas}', [TugasUserController::class, 'show'])->name('show');
        Route::post('/{tugas}', [TugasUserController::class, 'store'])->name('store');
        Route::delete('/{tugasUser}', [TugasUserController::class, 'destroy'])->name('destroy');
    });

// Auth Laravel
require __DIR__ . '/auth.php';
