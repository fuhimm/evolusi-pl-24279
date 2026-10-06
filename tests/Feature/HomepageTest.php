<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function test_homepage_returns_successful_response(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_homepage_displays_practicum_identity(): void
    {
        $response = $this->get('/');

        $response->assertSee(config('praktikum.nama'));
        $response->assertSee(config('praktikum.nim'));
        $response->assertSee('Kelas');
        $response->assertSee(config('praktikum.matkul'));
    }
}
