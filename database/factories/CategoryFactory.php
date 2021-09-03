<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name = $this->faker->unique()->colorName();
        $category_slug = Str::lower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name), "-"));
        return [
            'name' => $category_name,
            'slug' => $category_slug,
        ];
    }
}
