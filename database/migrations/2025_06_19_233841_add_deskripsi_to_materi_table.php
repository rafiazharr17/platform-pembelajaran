<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom 'deskripsi' ke tabel materi.
     */
    public function up(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->text('deskripsi')->after('judul')->nullable();
        });
    }

    /**
     * Rollback perubahan (hapus kolom 'deskripsi').
     */
    public function down(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};
