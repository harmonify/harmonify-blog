<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 20),
            'post_id' => mt_rand(1, 10),
            'parent_comment_id' => mt_rand(1, 10),
            'body' => collect($this->faker->paragraphs(mt_rand(3, 10)))
                ->map(fn($p) => "<p>{$p}</p>")
                ->implode(''),
        ];
    }
}
