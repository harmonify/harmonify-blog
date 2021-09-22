<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->unique()->slug(),
            'thumbnail' => "https://cdn.discordapp.com/attachments/890164256992018433/890164377116880896/keyboard3.jpg",
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(3, 10)))
                ->map(fn($p) => "<p>{$p}</p>")
                ->implode(''),
            'user_id' => mt_rand(1, 20),
            'category_id' => mt_rand(1, 10),
        ];
    }
}
