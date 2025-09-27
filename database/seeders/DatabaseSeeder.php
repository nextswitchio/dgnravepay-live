<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AdminUserSeeder::class,
            BlogPostSeeder::class,
            CareerPostSeeder::class,
            FaqSeeder::class,
        ]);

        if (\App\Models\Testimonial::count() === 0) {
            \App\Models\Testimonial::factory()->count(6)->create();
        }
    }
}
