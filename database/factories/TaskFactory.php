<?php

namespace Database\Factories;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'status' => $this->faker->randomElement(array ('Open', 'Closed')),
        ];

    }
}
