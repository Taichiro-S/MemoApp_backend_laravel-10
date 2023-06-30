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
        return [
            'user_id' => $this->faker->numberBetween($int1 = 1, $int2 = 10),
            'title' => $this->faker->realText($maxNbChars = 30, $indexSize = 5),
            'description' => $this->faker->realText($maxNbChars = 30, $indexSize = 5),
            'priority' => $this->faker->realText($maxNbChars = 30, $indexSize = 5),
            'completed' => $this->faker->boolean(),
            'start' => $this->faker->dateTime($max = 'now', $timezone = 'Asia/Tokyo'),
            'end' => $this->faker->dateTime($max = 'now', $timezone = 'Asia/Tokyo'),
        ];
    }
}
