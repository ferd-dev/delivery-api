<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => fn() => User::factory()->create(['role' => 'client']),
            'delivery_user_id' => fn() => User::factory()->create(['role' => 'delivery']),
            'content' => [
                'test' => 'content',
            ],
            'status' => 'pending',
        ];
    }
}
