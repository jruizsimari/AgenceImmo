<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = fake()->numberBetween(2, 10);
        return [
            'title' => fake()->sentence(6, true),
            'description' => $this->faker->sentences(5, true),
            'surface' => fake()->numberBetween(20, 400),
            'rooms' => $rooms,
            'bedrooms' => fake()->numberBetween(1, $rooms - 1),
            'floor' => fake()->numberBetween(0, 5),
            'price' => fake()->numberBetween(100000, 2000000),
            'city' => 'Marrakech',
            'address' => fake()->address(),
            'postal_code' => fake()->numberBetween(40000, 40160),
            'sold' => fake()->boolean(20),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($property) {
            // Prend 1 à 3 options aléatoires déjà existantes
            $options = Option::inRandomOrder()
                ->take(rand(1, 4))
                ->pluck('id');

            $property->options()->attach($options);
        });
    }
}
