<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan RoleSeeder
        $this->call(RoleSeeder::class);

        // Buat satu user untuk tiap role
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'id_role' => 1, // Sesuaikan ID rolenya
        ]);

        User::create([
            'name' => 'Guru User',
            'email' => 'guru@guru.com',
            'password' => Hash::make('password'),
            'id_role' => 2,
        ]);

        User::create([
            'name' => 'Murid User',
            'email' => 'murid@murid.com',
            'password' => Hash::make('password'),
            'id_role' => 3,
        ]);
    }
}
