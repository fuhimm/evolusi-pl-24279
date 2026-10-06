<?php

namespace Tests\Feature;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TugasCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_menampilkan_daftar_tugas(): void
    {
        Tugas::factory()->create(['judul' => 'Belajar GitHub Actions']);

        $this->get(route('tugas.index'))
            ->assertOk()
            ->assertSee('Belajar GitHub Actions');
    }

    public function test_index_menampilkan_pesan_saat_kosong(): void
    {
        $this->get(route('tugas.index'))
            ->assertOk()
            ->assertSee('Teks yang sengaja salah');
    }

    public function test_create_menyimpan_tugas_baru(): void
    {
        $response = $this->post(route('tugas.store'), [
            'judul' => 'Kerjakan laporan',
            'deskripsi' => 'Tulis laporan Tugas 2',
            'selesai' => '1',
        ]);

        $response->assertRedirect(route('tugas.index'));
        $this->assertDatabaseHas('tugas', [
            'judul' => 'Kerjakan laporan',
            'deskripsi' => 'Tulis laporan Tugas 2',
            'selesai' => true,
        ]);
    }

    public function test_show_menampilkan_detail_tugas(): void
    {
        $tugas = Tugas::factory()->create(['judul' => 'Detail tugas', 'selesai' => false]);

        $this->get(route('tugas.show', $tugas))
            ->assertOk()
            ->assertSee('Detail tugas')
            ->assertSee('Belum selesai');
    }

    public function test_update_mengubah_tugas(): void
    {
        $tugas = Tugas::factory()->create(['judul' => 'Judul lama', 'selesai' => false]);

        $this->put(route('tugas.update', $tugas), [
            'judul' => 'Judul baru',
            'deskripsi' => 'Deskripsi baru',
            'selesai' => '1',
        ])->assertRedirect(route('tugas.index'));

        $this->assertDatabaseHas('tugas', [
            'id' => $tugas->id,
            'judul' => 'Judul baru',
            'selesai' => true,
        ]);
        $this->assertDatabaseMissing('tugas', ['judul' => 'Judul lama']);
    }

    public function test_delete_menghapus_tugas(): void
    {
        $tugas = Tugas::factory()->create();

        $this->delete(route('tugas.destroy', $tugas))
            ->assertRedirect(route('tugas.index'));

        $this->assertDatabaseMissing('tugas', ['id' => $tugas->id]);
    }

    public function test_validasi_gagal_saat_judul_kosong(): void
    {
        $this->post(route('tugas.store'), ['judul' => '', 'deskripsi' => 'tanpa judul'])
            ->assertSessionHasErrors('judul');

        $this->assertDatabaseCount('tugas', 0);
    }
}
