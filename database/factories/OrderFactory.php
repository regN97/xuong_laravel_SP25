<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
            'total_amount' => fake()->randomFloat(2, 100, 1000),
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            'shipping_address' => fake()->address(),
            'payment_method' => fake()->randomElement(['cash', 'bank_transfer', 'credit_card']),
        ];
    }
} 