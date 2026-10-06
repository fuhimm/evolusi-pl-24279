<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Tugas::updateOrCreate(
            ['judul' => 'Tugas Frontend Vue'],
            ['deskripsi' => 'Membuat antarmuka dengan Vue 3', 'selesai' => true]
        );
        Tugas::updateOrCreate(
            ['judul' => 'Tugas Docker'],
            ['deskripsi' => 'Containerization aplikasi Laravel', 'selesai' => false]
        );
    }
}
