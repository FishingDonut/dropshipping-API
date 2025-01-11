<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->state(["name" => "S23", "price" => 4999.90, "price_multiplier" => 1.2, "description" => "Melhor celular"])->create();
        Product::factory()->state(["name" => "S24", "price" => 7599.50, "price_multiplier" => 1.7, "description" => "Celular de 2024"])->create();
        Product::factory()->state(["name" => "Camisa 1", "price" => 39.90, "price_multiplier" => 2.5, "description" => "Camisa basica"])->create();
        Product::factory()->count(2)->create();
    }
}
