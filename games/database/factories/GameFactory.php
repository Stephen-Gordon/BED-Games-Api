<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->name(),
            'publisher' => $this->faker->name(),
            'platform' => $this->faker->name(),
            'category' => $this->faker->name(),
            'price' => $this->faker->numberBetween(0,100),
        ];
    }
}
