<?php

namespace Database\Factories;

use App\Models\Establishment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->words(4, true),
            'price' => rand(1000, 5000),
            'details' => $this->faker->sentence(10),
            'establishment_id' => function () {
                return Establishment::factory()->create();
            },
        ];
    }
}
