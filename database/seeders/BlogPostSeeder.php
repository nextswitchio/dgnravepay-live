<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
  public function run(): void
  {
    $posts = [
      [
        'title' => 'The Smarter Way to Spend Online: DGNRavepay’s Virtual Dollar Mastercard',
        'author' => 'DGNRavepay Team',
        'excerpt' => 'From international shopping to subscriptions, here’s why our card keeps you ahead.',
        'content' => 'Full article content about virtual dollar Mastercard benefits...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(5),
      ],
      [
        'title' => 'How to Save Smarter with RaveGoals, RaveFlex, and RaveVault',
        'author' => 'Toluwani Omotesho',
        'excerpt' => 'A practical guide to choosing the right savings product for your goals.',
        'content' => 'Full article content about savings products...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(10),
      ],
      [
        'title' => 'Global Accounts vs Traditional Banks: What Remote Workers Should Know',
        'author' => 'Tunde Adelolu',
        'excerpt' => 'Compare fees, speed, and FX when getting paid globally.',
        'content' => 'Full article content comparing accounts vs banks...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(15),
      ],
    ];

    foreach ($posts as $p) {
      $slug = Str::slug($p['title']);
      BlogPost::updateOrCreate(
        ['slug' => $slug],
        [
          'title' => $p['title'],
          'author' => $p['author'],
          'excerpt' => $p['excerpt'],
          'content' => $p['content'],
          'cover_image_path' => $p['cover_image_path'],
          'is_published' => true,
          'published_at' => $p['published_at'],
          'slug' => $slug,
        ]
      );
    }
  }
}
