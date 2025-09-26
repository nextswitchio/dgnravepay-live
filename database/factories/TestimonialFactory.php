<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
  protected $model = Testimonial::class;

  public function definition(): array
  {
    return [
      'name' => $this->faker->name(),
      'content' => '<p>' . $this->faker->paragraph(2) . '</p>',
      'rating' => $this->faker->numberBetween(4, 5),
      'avatar_path' => null,
      'variant' => $this->faker->randomElement(['white', 'yellow']),
      'icon' => $this->faker->randomElement([null, 'play', 'bag', 'instagram', 'facebook']),
      'is_featured' => $this->faker->boolean(20),
      'is_published' => true,
      'sort_order' => 0,
    ];
  }
}
