<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courseId = $this->faker->numberBetween(1, 5);
        $last = Content::where('course_id', $courseId)->count();
        return [
            "course_id" => $courseId,
            "title" => $this->faker->sentence(6),
            "description" => $this->faker->sentence(20),
            "order" => +$last + 1,
            "is_media" => $isMedia = $this->faker->boolean(80),
            "article" => $isMedia ? null : $this->faker->sentence(500),
        ];
    }
}
