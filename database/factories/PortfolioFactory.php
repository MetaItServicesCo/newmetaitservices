<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'title' => $title,
            'slug' => \Str::slug($title),
            'sub_title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'thumbnail' => null,
            'gallery_images' => [],
            'image_alt' => $this->faker->sentence(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
