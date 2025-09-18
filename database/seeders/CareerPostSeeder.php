<?php

namespace Database\Seeders;

use App\Models\CareerPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CareerPostSeeder extends Seeder
{
  public function run(): void
  {
    $jobs = [
      [
        'title' => 'Admin Officer (Kano)',
        'location' => 'Kano, Nigeria',
        'department' => 'People Operations',
        'employment_type' => 'FULL_TIME',
        'summary' => 'Support office administration and operations in Kano.',
        'description' => 'Detailed description of the Admin Officer role, responsibilities, and requirements.',
        'published_at' => now()->subDays(3),
      ],
      [
        'title' => 'Business Development Executive',
        'location' => 'Lagos, Nigeria',
        'department' => 'Enterprise Sales',
        'employment_type' => 'FULL_TIME',
        'summary' => 'Drive growth by identifying and closing strategic opportunities.',
        'description' => 'Detailed description of BDE responsibilities and KPIs.',
        'published_at' => now()->subDays(7),
      ],
      [
        'title' => 'Business Relationship Manager (Abuja)',
        'location' => 'FCT, Nigeria',
        'department' => 'Enterprise Sales',
        'employment_type' => 'FULL_TIME',
        'summary' => 'Own key client relationships and expansion within Abuja.',
        'description' => 'Detailed description of BRM Abuja responsibilities.',
        'published_at' => now()->subDays(9),
      ],
    ];

    foreach ($jobs as $j) {
      $slug = Str::slug($j['title']);
      CareerPost::updateOrCreate(
        ['slug' => $slug],
        [
          'title' => $j['title'],
          'location' => $j['location'],
          'department' => $j['department'],
          'employment_type' => $j['employment_type'],
          'summary' => $j['summary'],
          'description' => $j['description'],
          'is_published' => true,
          'published_at' => $j['published_at'],
          'slug' => $slug,
        ]
      );
    }
  }
}
