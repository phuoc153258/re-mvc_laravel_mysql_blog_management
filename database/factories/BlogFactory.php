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
            'content' => "<p>Never in all their history have men been able truly to conceive of the world as one: a single
            sphere, a globe, having the qualities of a globe, a round earth in which all the directions
            eventually meet, in which there is no center because every point, or none, is center — an equal
            earth which all men occupy as equals. The airman's earth, if free men make it, will be truly
            round: a globe in practice, not in theory.</p>
        <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no
            turning back from science. The early warnings about technological dangers also come from
            science.</p>
        <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that
            they set eye on the earth.</p>
        <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become
            her protectors rather than her violators. That's how I felt seeing the Earth for the first time.
            I could not help but love and cherish her.</p>",
            'slug' => genarateSlug($title),
            'image' => 'image/blog_image_default.png',
            'user_id' => $this->faker->numberBetween(1, 2)
        ];
    }
}
