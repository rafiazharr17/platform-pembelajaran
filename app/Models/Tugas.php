<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
    ];

    public function getRouteKeyName()
    {
        return 'id_tugas';
    }

    public function pengumpulan()
    {
        return $this->hasMany(TugasUser::class, 'id_tugas');
    }
}

