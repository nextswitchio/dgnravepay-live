<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
  private const BOOL_SOMETIMES = 'sometimes|boolean';
  public function index()
  {
    $testimonials = Testimonial::orderBy('sort_order')->orderByDesc('id')->paginate(20);
    return view('admin.testimonials.index', compact('testimonials'));
  }

  public function create()
  {
    return view('admin.testimonials.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'content' => 'required|string',
      'rating' => 'nullable|integer|min:1|max:5',
      'avatar' => 'nullable|image|max:2048',
      'variant' => 'required|in:white,yellow',
      'icon' => 'nullable|in:play,bag,instagram,facebook',
      'is_featured' => self::BOOL_SOMETIMES,
      'is_published' => self::BOOL_SOMETIMES,
      'sort_order' => 'nullable|integer',
    ]);

    $avatarPath = null;
    if ($request->hasFile('avatar')) {
      $avatarPath = $request->file('avatar')->store('testimonial_avatars', 'public');
    }

    Testimonial::create([
      'name' => $data['name'],
      'content' => $data['content'],
      'rating' => $data['rating'] ?? 5,
      'avatar_path' => $avatarPath,
      'variant' => $data['variant'],
      'icon' => $data['icon'] ?? null,
      'is_featured' => (bool)($data['is_featured'] ?? false),
      'is_published' => (bool)($data['is_published'] ?? false),
      'sort_order' => $data['sort_order'] ?? 0,
    ]);

    return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial created');
  }

  public function edit(Testimonial $testimonial)
  {
    return view('admin.testimonials.edit', compact('testimonial'));
  }

  public function update(Request $request, Testimonial $testimonial)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'content' => 'required|string',
      'rating' => 'nullable|integer|min:1|max:5',
      'avatar' => 'nullable|image|max:2048',
      'variant' => 'required|in:white,yellow',
      'icon' => 'nullable|in:play,bag,instagram,facebook',
      'is_featured' => self::BOOL_SOMETIMES,
      'is_published' => self::BOOL_SOMETIMES,
      'sort_order' => 'nullable|integer',
    ]);

    if ($request->hasFile('avatar')) {
      if ($testimonial->avatar_path) {
        Storage::disk('public')->delete($testimonial->avatar_path);
      }
      $testimonial->avatar_path = $request->file('avatar')->store('testimonial_avatars', 'public');
    }

    $testimonial->fill([
      'name' => $data['name'],
      'content' => $data['content'],
      'rating' => $data['rating'] ?? $testimonial->rating,
      'variant' => $data['variant'],
      'icon' => $data['icon'] ?? null,
      'is_featured' => (bool)($data['is_featured'] ?? false),
      'is_published' => (bool)($data['is_published'] ?? false),
      'sort_order' => $data['sort_order'] ?? $testimonial->sort_order,
    ])->save();

    return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated');
  }

  public function destroy(Testimonial $testimonial)
  {
    if ($testimonial->avatar_path) {
      Storage::disk('public')->delete($testimonial->avatar_path);
    }
    $testimonial->delete();
    return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted');
  }
}
