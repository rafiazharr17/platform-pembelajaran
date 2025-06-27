<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasUser extends Model
{
    use HasFactory;

    protected $table = 'tugas_users';

    protected $fillable = [
        'id_tugas',
        'user_id',
        'file_jawaban',
        'submitted_at',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}