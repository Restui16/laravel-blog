<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'category_id' => Category::pluck('id')->random(),
            'title' => fake()->sentence(mt_rand(2,8)),
            'slug' => fake()->slug(),
            'desc' => fake()->paragraph(5),
            'img' => fake()->imageUrl(640, 480, 'animals', true),
            'views' => fake()->numberBetween(1,10),
            'status' => fake()->randomDigit(0,1),
            'publish_date' => fake()->dateTime(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
