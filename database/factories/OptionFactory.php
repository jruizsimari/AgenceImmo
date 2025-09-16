<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'piscine',
                'terrain de basket',
                'padel',
                'jacuzzi',
                'internet',
                'garage',
                'jardin',
                'balcon',
                'terrasse',
                'ascenseur'
            ])
        ];
    }
}
