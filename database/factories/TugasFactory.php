<?php

namespace Database\Factories;

use App\Models\Tugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tugas>
 */
class TugasFactory extends Factory
{
    protected $model = Tugas::class;

    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(4),
            'deskripsi' => fake()->paragraph(),
            'selesai' => fake()->boolean(),
        ];
    }
}
