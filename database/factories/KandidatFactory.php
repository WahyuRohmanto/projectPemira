<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\WithFaker;

class KandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory = new Factory();
        $factory->define(\App\Models\Kandidat::class, function(Faker $faker){
            
            return [
                'presma_id' => $faker->randomDigitNotNull(),
                'visi_misi' => $faker->sentence(),
            ];
        });
    }
}
