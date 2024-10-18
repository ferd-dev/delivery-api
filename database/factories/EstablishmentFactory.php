<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstablishmentFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'logo' => 'logos/' . Str::random() . '.png',
        ];
    }
}
