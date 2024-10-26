<?php

namespace Database\Seeders;

use App\Models\Establishment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablishmentSeeder extends Seeder
{
    public function run()
    {
        Establishment::factory()
            ->has(Product::factory()->count(5))
            ->count(50)
            ->create();
    }
}
