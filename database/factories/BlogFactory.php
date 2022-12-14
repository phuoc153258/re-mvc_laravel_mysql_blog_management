<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Blog::class;

    public function definition()
    {
        $title = $this->faker->text(30);
        return [
            'title' => $title,
            'sub_title' => $this->faker->text(100),
            'content' => $this->faker->text(),
            'slug' => genarateSlug($title),
            'image' => 'image/blog_image_default.png',
            'user_id' => $this->faker->numberBetween(1, 2)
        ];
    }
}
