<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    private const RULE_BOOL_SOMETIMES = 'sometimes|boolean';
    public function index()
    {
        $query = BlogPost::with('tags');

        // Filters
        $search = request('q');
        $status = request('status'); // 'published' | 'draft' | null
        $featured = request('featured'); // 'featured' | 'not_featured' | null
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }
        if ($status === 'published') {
            $query->where('is_published', true);
        } elseif ($status === 'draft') {
            $query->where('is_published', false);
        }

        if ($featured === 'featured') {
            $query->where('is_featured', true);
        } elseif ($featured === 'not_featured') {
            $query->where('is_featured', false);
        }

        $posts = $query->latest('updated_at')->paginate(15)->appends(request()->query());
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
            'is_featured' => self::RULE_BOOL_SOMETIMES,
            'is_published' => self::RULE_BOOL_SOMETIMES,
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
            'is_featured' => $data['is_featured'] ?? false,
            'is_published' => $data['is_published'] ?? false,
            'published_at' => $data['published_at'] ?? null,
        ];

        $post = BlogPost::create($payload);

        // Sync tags if provided
        if ($request->filled('tags')) {
            $tagNames = collect(explode(',', $request->input('tags')))
                ->map(fn($t) => trim($t))
                ->filter()
                ->unique();
            $tagIds = [];
            foreach ($tagNames as $name) {
                $slug = Str::slug($name);
                $tag = Tag::firstOrCreate(['slug' => $slug], ['name' => $name]);
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }
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
            'is_featured' => self::RULE_BOOL_SOMETIMES,
            'is_published' => self::RULE_BOOL_SOMETIMES,
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
            'is_featured' => $data['is_featured'] ?? false,
            'is_published' => $data['is_published'] ?? false,
            'published_at' => $data['published_at'] ?? null,
        ];

        $blog_post->update($payload);

        // Sync tags if provided
        if ($request->has('tags')) {
            $tagNames = collect(explode(',', (string) $request->input('tags')))
                ->map(fn($t) => trim($t))
                ->filter()
                ->unique();
            $tagIds = [];
            foreach ($tagNames as $name) {
                $slug = Str::slug($name);
                $tag = Tag::firstOrCreate(['slug' => $slug], ['name' => $name]);
                $tagIds[] = $tag->id;
            }
            $blog_post->tags()->sync($tagIds);
        }
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

    public function togglePublish(BlogPost $blog_post)
    {
        $blog_post->is_published = !$blog_post->is_published;
        if ($blog_post->is_published && !$blog_post->published_at) {
            $blog_post->published_at = now();
        }
        $blog_post->save();
        return back()->with('status', 'Publish state updated');
    }
}
