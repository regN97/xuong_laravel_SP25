<?php

namespace Database\Factories;

use App\Models\UploadFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => UploadFile::inRandomOrder()->first()->id ?? 1,
            'description' => fake()->sentence(),
        ];
    }
} 