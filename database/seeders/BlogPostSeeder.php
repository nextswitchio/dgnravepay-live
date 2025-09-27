<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
  private const TEAM = 'DGNRavepay Team';
  public function run(): void
  {
    $posts = [
      [
        'title' => 'The Smarter Way to Spend Online: DGNRavepay’s Virtual Dollar Mastercard',
        'author' => self::TEAM,
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
      [
        'title' => 'Master Cross‑Border Payments: Avoid Hidden Fees and Bad FX Rates',
        'author' => self::TEAM,
        'excerpt' => 'The smartest ways to move money internationally without losing value.',
        'content' => 'Deep dive into cross-border payment methods, fees, FX spreads, and timing...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(2),
      ],
      [
        'title' => 'Budgeting That Actually Sticks: 3 Frameworks You Can Start Today',
        'author' => 'Aisha Bello',
        'excerpt' => '50/30/20 vs Zero‑based vs Pay‑yourself‑first—pick what works for you.',
        'content' => 'Actionable budgeting frameworks with examples and templates for everyday use...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(4),
      ],
      [
        'title' => 'Card Declined Online? 7 Common Causes and How to Fix Them Fast',
        'author' => 'DGNRavepay Support',
        'excerpt' => 'From merchant MCC blocks to 3DS hiccups, here’s how to resolve issues quickly.',
        'content' => 'Troubleshooting guide for online card declines, with steps and prevention tips...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(6),
      ],
      [
        'title' => 'Fraud Safety 101: Keep Your Cards and Accounts Secure',
        'author' => 'Kelechi Okoye',
        'excerpt' => 'Simple habits that stop 90% of fraud attempts before they happen.',
        'content' => 'Security best practices, device hygiene, phishing red flags, and 2FA...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(8),
      ],
      [
        'title' => 'Subscriptions Without Hassle: Manage Netflix, Spotify, and More',
        'author' => self::TEAM,
        'excerpt' => 'Use virtual cards, set limits, and auto‑pause to stay in control.',
        'content' => 'Guide to managing recurring payments with virtual cards and budgeting tools...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(12),
      ],
      [
        'title' => 'From Freelance to Global: Get Paid in USD, Settle in Naira',
        'author' => 'Tunde Adelolu',
        'excerpt' => 'Invoices, payout speeds, and the smartest routes for better FX.',
        'content' => 'Explainer on global receiving accounts, invoicing, and payout strategies...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(14),
      ],
      [
        'title' => '5 Ways to Build Credit History Without a Traditional Credit Card',
        'author' => 'Toluwani Omotesho',
        'excerpt' => 'Practical steps to become creditworthy with modern tools.',
        'content' => 'Alternatives for building credit, reporting rent/utilities, and savings‑backed products...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(18),
      ],
      [
        'title' => 'The Ultimate Guide to Virtual Cards: Setup, Limits, and Controls',
        'author' => self::TEAM,
        'excerpt' => 'Everything you need to know to use virtual cards like a pro.',
        'content' => 'Comprehensive guide to creating, funding, and managing virtual cards...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(21),
      ],
      [
        'title' => 'Stop Paying Too Much for FX: Timing and Tools That Save Money',
        'author' => 'Aisha Bello',
        'excerpt' => 'Why rate alerts and bulk conversions can improve your average rate.',
        'content' => 'FX strategy for individuals and SMEs, hedging basics, and alert workflows...',
        'cover_image_path' => null,
        'published_at' => now()->subDays(24),
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
          'is_featured' => $p['title'] === 'The Smarter Way to Spend Online: DGNRavepay’s Virtual Dollar Mastercard',
          'is_published' => true,
          'published_at' => $p['published_at'],
          'slug' => $slug,
        ]
      );
    }
  }
}
