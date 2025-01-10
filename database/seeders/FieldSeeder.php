<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::factory()->state(["category_id" => 1, "name"=> "celular", "type"=> "select", "options"=> ["Samsung", "Iphone", "Xiaomi"]])->create();
        Field::factory()->state(["category_id" => 2, "name"=> "cores", "type"=> "select", "options"=> ["Branco", "Preto", "Rosa"]])->create();
        Field::factory()->state(["category_id" => 2, "name"=> "tamanho", "type"=> "select", "options"=> ["P", "M", "G", "GG", "XL"]])->create();
    }
}
