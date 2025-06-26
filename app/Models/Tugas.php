<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

