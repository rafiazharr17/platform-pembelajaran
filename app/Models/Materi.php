<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'user_id',
        'judul',
        'konten',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
