<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->catchPhrase(),
            'status' => $this->faker->randomElement([true, false]),
            'created_at' => $this->faker->time($max = 'now'),
            'updated_at' => now(),
        ];
    }
}
