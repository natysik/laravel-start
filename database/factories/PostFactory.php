<?php

namespace Database\Factories;

use App\Models\Category;
use app\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
	protected $model = Post::class;
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'title' => $this->faker->sentence(4),
			'content' => $this->faker->text(),
			'img' => $this->faker->imageUrl(),
			'likes' => 0,
			'is_published' => 1,
			'category_id' => Category::get()->random()->id,
		];
	}
}
