<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tugas;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tugasList = [
            ['judul' => 'Tugas Frontend Vue', 'deskripsi' => 'Membuat antarmuka dengan Vue 3', 'selesai' => true],
            ['judul' => 'Tugas Docker', 'deskripsi' => 'Containerization aplikasi Laravel', 'selesai' => false],
            ['judul' => 'Tugas 3', 'deskripsi' => 'Deskripsi 3', 'selesai' => false],
        ];
        
        foreach ($tugasList as $t) {
            Tugas::updateOrCreate(['judul' => $t['judul']], $t);
        }
    }
}
