<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(15);
        return view('admin.blog_posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog_posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Handle cover image upload
        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('blog_covers', 'public');
        }

        $payload = [
            'title' => $data['title'],
            'slug' => $data['slug'],
            'author' => $data['author'] ?? null,
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'],
            'cover_image_path' => $coverPath,
            'is_published' => $data['is_published'] ?? false,
            'published_at' => $data['published_at'] ?? null,
        ];

        BlogPost::create($payload);
        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post created');
    }

    public function edit(BlogPost $blog_post)
    {
        return view('admin.blog_posts.edit', ['post' => $blog_post]);
    }

    public function update(Request $request, BlogPost $blog_post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . $blog_post->id,
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        // Handle cover image replacement
        $coverPath = $blog_post->cover_image_path;
        if ($request->hasFile('cover_image')) {
            // Delete old file if present
            if ($coverPath) {
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover_image')->store('blog_covers', 'public');
        }

        $payload = [
            'title' => $data['title'],
            'slug' => $data['slug'],
            'author' => $data['author'] ?? null,
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'],
            'cover_image_path' => $coverPath,
            'is_published' => $data['is_published'] ?? false,
            'published_at' => $data['published_at'] ?? null,
        ];

        $blog_post->update($payload);
        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post updated');
    }

    public function destroy(BlogPost $blog_post)
    {
        if ($blog_post->cover_image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($blog_post->cover_image_path);
        }
        $blog_post->delete();
        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post deleted');
    }
}
