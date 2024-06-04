<?php

namespace Database\Factories;

use App\Models\Product;
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
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
