<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerPostController extends Controller
{
    public function index()
    {
        $posts = CareerPost::latest()->paginate(15);
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
            'location' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,internship',
            'summary' => 'nullable|string',
            'description' => 'required|string',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        CareerPost::create($data);
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
            'slug' => 'required|string|max:255|unique:career_posts,slug,'.$career_post->id,
            'location' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,internship',
            'summary' => 'nullable|string',
            'description' => 'required|string',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
        ]);

        $career_post->update($data);
        return redirect()->route('admin.career-posts.index')->with('status', 'Career post updated');
    }

    public function destroy(CareerPost $career_post)
    {
        $career_post->delete();
        return redirect()->route('admin.career-posts.index')->with('status', 'Career post deleted');
    }
}
