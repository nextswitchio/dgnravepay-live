<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CareerPostController extends Controller
{
    private const STR255 = 'nullable|string|max:255';
    public function index()
    {
        $query = CareerPost::query();

        // Filters
        $search = request('q');
        $status = request('status'); // 'published' | 'draft' | null
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%")
                    ->orWhere('department', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('employment_type', 'like', "%{$search}%");
            });
        }
        if ($status === 'published') {
            $query->where('is_published', true);
        } elseif ($status === 'draft') {
            $query->where('is_published', false);
        }

        $posts = $query->latest('updated_at')->paginate(15)->appends(request()->query());
        return view('admin.career_posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.career_posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:career_posts,slug',
            'location' => self::STR255,
            'department' => self::STR255,
            'employment_type' => 'required|in:full_time,part_time,contract,internship',
            'summary' => 'nullable|string',
            'description' => 'required|string',
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
            $coverPath = $request->file('cover_image')->store('career_covers', 'public');
        }

        $payload = [
            'title' => $data['title'],
            'slug' => $data['slug'],
            'location' => $data['location'] ?? null,
            'department' => $data['department'] ?? null,
            'employment_type' => $data['employment_type'],
            'summary' => $data['summary'] ?? null,
            'description' => $data['description'],
            'cover_image_path' => $coverPath,
            'is_published' => $data['is_published'] ?? false,
            'published_at' => $data['published_at'] ?? null,
        ];

        CareerPost::create($payload);
        return redirect()->route('admin.career-posts.index')->with('status', 'Career post created');
    }

    public function edit(CareerPost $career_post)
    {
        return view('admin.career_posts.edit', ['post' => $career_post]);
    }

    public function update(Request $request, CareerPost $career_post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:career_posts,slug,' . $career_post->id,
            'location' => self::STR255,
            'department' => self::STR255,
            'employment_type' => 'required|in:full_time,part_time,contract,internship',
            'summary' => 'nullable|string',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        // Handle cover image replacement
        $coverPath = $career_post->cover_image_path;
        if ($request->hasFile('cover_image')) {
            if ($coverPath) {
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover_image')->store('career_covers', 'public');
        }

        $payload = [
            'title' => $data['title'],
            'slug' => $data['slug'],
            'location' => $data['location'] ?? null,
            'department' => $data['department'] ?? null,
            'employment_type' => $data['employment_type'],
            'summary' => $data['summary'] ?? null,
            'description' => $data['description'],
            'cover_image_path' => $coverPath,
            'is_published' => $data['is_published'] ?? false,
            'published_at' => $data['published_at'] ?? null,
        ];

        $career_post->update($payload);
        return redirect()->route('admin.career-posts.index')->with('status', 'Career post updated');
    }

    public function destroy(CareerPost $career_post)
    {
        if ($career_post->cover_image_path) {
            Storage::disk('public')->delete($career_post->cover_image_path);
        }
        $career_post->delete();
        return redirect()->route('admin.career-posts.index')->with('status', 'Career post deleted');
    }

    public function togglePublish(CareerPost $career_post)
    {
        $career_post->is_published = !$career_post->is_published;
        if ($career_post->is_published && !$career_post->published_at) {
            $career_post->published_at = now();
        }
        $career_post->save();
        return back()->with('status', 'Publish state updated');
    }
}
