<?php

namespace Database\Factories;

use App\Models\CareerPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class CareerPostFactory extends Factory
{
    protected $model = CareerPost::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'slug' => $this->faker->slug(),
            'location' => $this->faker->city(),
            'department' => $this->faker->randomElement(['Engineering', 'Marketing', 'Sales', 'HR', 'Finance']),
            'employment_type' => $this->faker->randomElement(['full_time', 'part_time', 'contract', 'internship']),
            'summary' => $this->faker->paragraph(),
            'description' => $this->faker->paragraphs(3, true),
            'cover_image_path' => null,
            'is_published' => true,
            'published_at' => now(),
        ];
    }

    public function unpublished(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}