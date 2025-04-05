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
        $status_array = ['completed', 'not completed'];
        $priority_array = ['low', 'medium', 'high'];
        return [
            'title' => fake('ru_RU')->sentence(random_int(1, 5)),
            'description' => fake('ru_RU')->sentence(random_int(0, 20)),
            'due_date' => fake('ru_RU')->dateTime(),
            'create_date' => now(),
            'status' => $status_array[random_int(0, 1)],
            'priority' => $priority_array[random_int(0, 2)],
            'category' => fake('ru_RU')->word(),
        ];
    }
}
