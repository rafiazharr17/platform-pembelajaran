<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi', // Tambahkan ini
        'file_path',  // Tambahkan ini
        'file_type',  // Tambahkan ini
        'thumbnail_path', // Tambahkan ini
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Dalam App\Models\Materi.php
    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'materi_id', 'id');
    }
}
