<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hour>
 */
class HourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hour' => fake()->dateTime()  //randomElement(['10:00','11:00','14:00','16:00','18:00','19:00','20:00'])
        ];
    }
}
