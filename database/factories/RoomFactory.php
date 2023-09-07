<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'type' => $this->faker->randomElement(['Suite', 'Standard', 'Deluxe']),
            'price' => $this->faker->numberBetween(50, 500),
            'image_path' => $this->faker->imageUrl(),
            'simple_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    
    }
}
