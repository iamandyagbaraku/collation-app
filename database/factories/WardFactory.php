<?php

namespace Database\Factories;

use App\Models\LocalGovernmentArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ward>
 */
class WardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'code' => fake()->unique()->randomNumber(6, true),
            'local_government_area_id' => fake()->numberBetween(1, LocalGovernmentArea::count()),
        ];
    }
}
