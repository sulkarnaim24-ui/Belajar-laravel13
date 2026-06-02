<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        'category_id' => \App\Models\Category::factory(), 
        'name' => $this->faker->words(3, true),
        'price' => $this->faker->numberBetween(10000, 500000),
        'stock' => $this->faker->numberBetween(5, 100),
        'sku' => strtoupper($this->faker->unique()->bothify('PROD-####')),
    ];
}
}
