<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // design every record structure and value. after this go to seeder to set generated number.
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(7),
            'completed' => fake()->boolean
        ];
    }
}
