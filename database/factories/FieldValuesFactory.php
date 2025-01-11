<?php

namespace Database\Factories;

use App\Models\Field;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FieldValues>
 */
class FieldValuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $field = Field::query()->inRandomOrder()->first();
        if ($field->type == "select") {
            return [
                "field_id" => $field->id,
                "product_id" => Product::query()->inRandomOrder()->first()->id,
                "value" => $field->options[rand(0, count($field->options) -1)]
            ];
        }

        if ($field->type == "string") {
            return [
                "field_id" => $field->id,
                "product_id" => Product::query()->inRandomOrder()->first()->id,
                "value" => fake()->word()
            ];
        }

        return [
            "field_id" => $field->id,
            "product_id" => Product::query()->inRandomOrder()->first()->id,
            "value" => fake()->numberBetween(0, 1000)
        ];
    }
}
