<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "category_id" => Category::query()->inRandomOrder("id")->first()->id,
            "name" => $this->faker->name,
            "type" => $this->faker->randomElement(["string", "integer"])
        ];
    }
}
