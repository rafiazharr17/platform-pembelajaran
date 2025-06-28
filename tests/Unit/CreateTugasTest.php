<?php

namespace Tests\Unit;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTugasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tugas_dapat_dibuat()
    {
        $tugas = Tugas::create([
            'judul' => 'Tugas Fisika',
            'deskripsi' => 'Kerjakan bab 1-2',
            'deadline' => now()->addDays(2),
        ]);

        $this->assertDatabaseHas('tugas', [
            'judul' => 'Tugas Fisika',
        ]);
    }
}
