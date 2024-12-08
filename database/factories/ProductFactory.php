<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
        $now = now();
        return [
            'name' => $this->faker->word, // Menghasilkan nama acak
            'price' => $this->faker->randomFloat(2, 10, 100) *1000, // Harga acak antara 10 dan 1000
            'stock' => $this->faker->numberBetween(1, 100), // Stok acak antara 1 dan 100
            'category_id' => Category::inRandomOrder()->first()->id, // Random category_id
            'brand_id' => Brand::inRandomOrder()->first()->id, // Random brand_id
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
