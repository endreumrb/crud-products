<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'cover' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(1, 20, 30),
            'description' => $this->faker->sentence(),
            'stock' => $this->faker->randomDigit(),
        ];
    }
}