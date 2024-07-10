<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => mt_rand(1,20),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'body' => $this->faker->paragraph(),

        ];
    }
}
