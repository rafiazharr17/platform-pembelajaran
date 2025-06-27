<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Materi;
use App\Models\Komentar;
use App\Models\Forum;
use App\Models\Tugas;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // =========================
    // 🔗 RELASI DATABASE
    // =========================

    // 1. Relasi ke Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    // 2. Relasi ke Materi yang diunggah user
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    // 3. Relasi ke Komentar yang dibuat user
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    // 4. Relasi ke Forum yang dibuat user
    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    // 5. Relasi ke Tugas yang dikerjakan user melalui pivot
    public function tugasDikerjakan()
    {
        return $this->belongsToMany(Tugas::class, 'tugas_users')
            ->withPivot('jawaban', 'waktu_pengumpulan');
    }
    public function getRoleNameAttribute()
    {
        return $this->role ? $this->role->nama_role : null;
    }
}
