<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(6),
            'description' => $this->faker->sentence(20),
            'price' => $this->faker->randomFloat(2, 0, 10),
            "user_id" => 2
        ];
    }
}
