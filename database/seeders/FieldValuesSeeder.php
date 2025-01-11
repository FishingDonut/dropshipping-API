<?php

namespace Database\Seeders;

use App\Models\FieldValues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldValues::factory()->count(5)->create();
    }
}
