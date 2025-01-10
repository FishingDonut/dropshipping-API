<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->state(["name" => "Marca"])->create();
        Category::factory()->state(["name" => "Camisas"])->create();
        Category::factory()->state(["name" => "Carro"])->create();
        Category::factory()->state(["name" => "Comida"])->create();
    }
}
