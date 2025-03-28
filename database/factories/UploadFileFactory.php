<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UploadFile>
 */
class UploadFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_name' => fake()->unique()->word() . '.' . fake()->fileExtension(),
            'file_path' => "uploads/" . fake()->uuid() . '.' . fake()->fileExtension(),
            'file_type' => fake()->fileExtension(),
            'uploaded_by' => User::inRandomOrder()->first()->id ?? 1,
        ];
    }
}