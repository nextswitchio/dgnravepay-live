<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\BlogPost;

class BlogAssetHandlingTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_cover_asset_helper_with_valid_path()
    {
        $result = blog_cover_asset('test-image.jpg');
        
        // Should return a fallback URL since the file doesn't exist
        $this->assertStringContainsString('article 1.jpg', $result);
    }

    public function test_blog_cover_asset_helper_with_null_path()
    {
        $result = blog_cover_asset(null);
        
        // Should return fallback URL
        $this->assertStringContainsString('article 1.jpg', $result);
    }

    public function test_blog_cover_asset_helper_with_empty_path()
    {
        $result = blog_cover_asset('');
        
        // Should return fallback URL
        $this->assertStringContainsString('article 1.jpg', $result);
    }

    public function test_blog_templates_use_safe_asset_helpers()
    {
        // Create a test blog post
        $post = BlogPost::create([
            'title' => 'Test Blog Post',
            'slug' => 'test-blog-post',
            'author' => 'Test Author',
            'excerpt' => 'Test excerpt',
            'content' => 'Test content',
            'cover_image_path' => 'test-cover.jpg',
            'is_featured' => true,
            'is_published' => true,
            'published_at' => now(),
        ]);

        // Test blog listing page
        $response = $this->get('/blog');
        $response->assertStatus(200);
        
        // Test blog detail page
        $response = $this->get('/blog/' . $post->slug);
        $response->assertStatus(200);
    }
}