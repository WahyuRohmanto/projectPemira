<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Kandidat, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class KandidatControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function itShouldStoredToDatabase()
    {
        $kandidat = factory(Kandidat::class)->create(); 

        $kandidat->assertStatus(201);
    }

    public function test_example()
    {
        $response = $this->get('/voting');

        $response->assertStatus(200);
    }
}
