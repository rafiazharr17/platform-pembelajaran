<?php

namespace Tests\Unit;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTugasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tugas_dapat_diperbarui()
    {
        $tugas = Tugas::create([
            'judul' => 'Tugas Lama',
            'deskripsi' => 'Deskripsi Awal',
        ]);

        $tugas->update([
            'judul' => 'Tugas Baru',
        ]);

        $this->assertEquals('Tugas Baru', $tugas->fresh()->judul);
    }
}
