<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $query = BlogPost::query()->where('is_published', true);

        // Simple search by title or excerpt
        if ($search = request('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        // Filter by tag if provided
        $tagSlug = request('tag');
        if ($tagSlug) {
            $query->whereHas('tags', function ($q) use ($tagSlug) {
                $q->where('slug', $tagSlug);
            });
        }

        // Prefer a featured post when on the first page and no search filter
        $featured = null;
        if (!request()->has('page') && !$search && !$tagSlug) {
            $featured = BlogPost::where('is_published', true)
                ->where('is_featured', true)
                ->latest('published_at')
                ->first();
        }

        $posts = $query->latest('published_at')->paginate(9);
        // Views will preserve query string on Prev/Next links manually
        return view('pages.blog', compact('posts', 'featured'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();

        // Tag-based related posts if tags exist; otherwise fallback to latest
        $related = collect();
        if ($post->relationLoaded('tags') ? $post->tags->isNotEmpty() : $post->tags()->exists()) {
            $tagIds = $post->tags()->pluck('tags.id');
            $related = BlogPost::where('is_published', true)
                ->where('id', '!=', $post->id)
                ->whereHas('tags', function ($q) use ($tagIds) {
                    $q->whereIn('tags.id', $tagIds);
                })
                ->latest('published_at')
                ->take(2)
                ->get();
        }
        if ($related->isEmpty()) {
            $related = BlogPost::where('is_published', true)
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->take(2)
                ->get();
        }

        return view('pages.blog-detail', compact('post', 'related'));
    }
}
