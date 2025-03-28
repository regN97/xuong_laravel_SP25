<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\UploadFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->word();
        $slugBase = Str::slug($title);
        $slug = $slugBase . '-' . fake()->unique()->numberBetween(1000, 9999);

        // Kiểm tra slug đã tồn tại chưa
        while (Post::where('slug', $slug)->exists()) {
            $title = fake()->word();
            $slug = $slugBase . '-' . fake()->unique()->numberBetween(1000, 9999);
        }

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->sentence(),
            'uploaded_by' => User::inRandomOrder()->first()->id ?? 1,
            'image' => UploadFile::inRandomOrder()->first()->id ?? 1,
            'status' => fake()->randomElement(['draft', 'published']),
        ];
    }
}