<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestLists>
 */
class TestListsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'subject' => fake()->sentence(),
            'email' => fake()->unique()->safeEmail(),
            'content' => fake() -> paragraph(10)
        ];
    }
}
