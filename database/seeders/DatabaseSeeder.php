<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tugas;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tugasList = [
            ['judul' => 'Tugas 1', 'deskripsi' => 'Deskripsi 1', 'selesai' => true],
            ['judul' => 'Tugas 2', 'deskripsi' => 'Deskripsi 2', 'selesai' => false],
            ['judul' => 'Tugas 3', 'deskripsi' => 'Deskripsi 3', 'selesai' => false],
        ];
        
        foreach ($tugasList as $t) {
            Tugas::updateOrCreate(['judul' => $t['judul']], $t);
        }
    }
}
