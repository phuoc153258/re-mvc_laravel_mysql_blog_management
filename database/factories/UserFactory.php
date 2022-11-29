<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model  = User::class;

    public function definition()
    {
        return [
            'username' => fake()->unique()->userName(),
            'fullname' => fake()->name(),
            'avatar' => 'image/user_avatar_default.jpg',
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$Gii.ZY8LlkdIN6mUEw5ojOaawUKgfLP5wZxcjocF1BIgv0egyzIOq',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
