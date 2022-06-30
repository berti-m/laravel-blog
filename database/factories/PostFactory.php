<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->sentence,
            'excerpt' => '<p>'.implode('</p><p>', $this->faker->paragraphs(3)).'</p>',
            'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(7)).'</p>'
        ];
    }
}
