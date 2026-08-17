<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
        return [
            'task_name' => fake()->sentence(3),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'description' => fake()->paragraph(),
            'completed' => fake()->boolean(30),
            'due_date' => fake()->dateTimeBetween('today', '+30 days'),
        ];
    }
}
