<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $brands = \DB::table('brands')->pluck('id');
        $categories = \DB::table('categories')->pluck('id');
        return [
            'name' => $this->faker->catchPhrase(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9000),
            'status' => $this->faker->numberBetween($min=1,$max=10),
            'brand_id' => $this->faker->randomElement($brands),
            'category_id' => $this->faker->randomElement($categories),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
