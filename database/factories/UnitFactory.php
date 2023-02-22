<?php

namespace Database\Factories;

use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(3, true),
            'ward_id' => fake()->numberBetween(1, Ward::count()),
            'code' => fake()->unique()->randomNumber(6, true),
            'vote' => fake()->numberBetween(1, 350000),
        ];
    }
}
