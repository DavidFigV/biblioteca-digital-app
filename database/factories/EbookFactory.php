<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ebook>
 */
class EbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = \App\Models\Category::inRandomOrder()->first() ?? \App\Models\Category::factory()->create();

        return [
            'category_id' => $category->id,
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'synopsis' => $this->faker->paragraph(),
            'isbn' => $this->faker->unique()->isbn13(),
            'format' => $this->faker->randomElement(['PDF','EPUB','MOBI']),
            'file_path' => $this->faker->url(),
            'published_year' => $this->faker->numberBetween(1990, date('Y')),
            'is_active' => true,
        ];
    }
}
