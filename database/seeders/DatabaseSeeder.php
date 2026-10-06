<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tugas;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tugasList = [
            ['nama' => 'Tugas 1', 'status' => 'Selesai'],
            ['nama' => 'Tugas 2', 'status' => 'Belum'],
            ['nama' => 'Tugas 3', 'status' => 'Belum'],
        ];
        
        foreach ($tugasList as $t) {
            Tugas::updateOrCreate(['nama' => $t['nama']], $t);
        }
    }
}
