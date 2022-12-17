<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition()
    {
        return [
            'content' => "<p>Bai viet rat huu ich :D</p>",
            'user_id' => $this->faker->numberBetween(1, 3),
            'blog_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
