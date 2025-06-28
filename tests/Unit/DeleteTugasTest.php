<?php

namespace Tests\Unit;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTugasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tugas_dapat_dihapus()
    {
        $tugas = Tugas::create([
            'judul' => 'Tugas Hapus',
            'deskripsi' => 'Akan dihapus',
        ]);

        $tugas->delete();

        $this->assertDatabaseMissing('tugas', [
            'id_tugas' => $tugas->id_tugas,
        ]);
    }
}
