<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\UploadFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $name = fake()->word();
        $slug = Str::slug($name, '-' . fake()->unique()->numberBetween(1000, 9999));

        while (Product::where('slug', $slug)->exists()) {
            $name = fake()->word();
            $slug = Str::slug($name, '-' . fake()->unique()->numberBetween(1000, 9999));
        }
        
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'brand_id' => Brand::inRandomOrder()->first()->id ?? 1,
            'price' => fake()->randomFloat(2, 100, 10000),
            'discount' => fake()->randomFloat(2, 0, 50),
            'stock' => fake()->numberBetween(0, 1000),
            'image' => UploadFile::inRandomOrder()->first()->id ?? null,
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
} 