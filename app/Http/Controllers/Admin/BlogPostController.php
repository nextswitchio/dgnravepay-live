<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'cover_image_path' => 'nullable|string',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        BlogPost::create($data);
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
            'slug' => 'required|string|max:255|unique:blog_posts,slug,'.$blog_post->id,
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image_path' => 'nullable|string',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        $blog_post->update($data);
        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post updated');
    }

    public function destroy(BlogPost $blog_post)
    {
        $blog_post->delete();
        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog post deleted');
    }
}
