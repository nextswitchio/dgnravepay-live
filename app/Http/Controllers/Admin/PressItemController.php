<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PressItemController extends Controller
{
    private const RULE_BOOL_SOMETIMES = 'sometimes|boolean';

    public function index()
    {
        $query = PressItem::query();

        // Filters
        $search = request('q');
        $category = request('category');
        $status = request('status'); // 'published' | 'draft' | null
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        if ($category && in_array($category, array_keys(PressItem::CATEGORIES))) {
            $query->where('category', $category);
        }
        
        if ($status === 'published') {
            $query->where('is_published', true);
        } elseif ($status === 'draft') {
            $query->where('is_published', false);
        }

        $items = $query->orderBy('order')->latest('updated_at')->paginate(20)->appends(request()->query());
        return view('admin.press_items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.press_items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url|max:500',
            'category' => 'required|string|in:' . implode(',', array_keys(PressItem::CATEGORIES)),
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_published' => self::RULE_BOOL_SOMETIMES,
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('press_items', 'public');
        }

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'url' => $data['url'] ?? null,
            'category' => $data['category'],
            'image_path' => $imagePath,
            'order' => $data['order'] ?? 0,
            'is_published' => $data['is_published'] ?? false,
        ];

        PressItem::create($payload);
        return redirect()->route('admin.press-items.index')->with('status', 'Press item created');
    }

    public function edit(PressItem $press_item)
    {
        return view('admin.press_items.edit', ['item' => $press_item]);
    }

    public function update(Request $request, PressItem $press_item)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url|max:500',
            'category' => 'required|string|in:' . implode(',', array_keys(PressItem::CATEGORIES)),
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_published' => self::RULE_BOOL_SOMETIMES,
        ]);

        // Handle image replacement
        $imagePath = $press_item->image_path;
        if ($request->hasFile('image')) {
            // Delete old file if present
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('press_items', 'public');
        }

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'url' => $data['url'] ?? null,
            'category' => $data['category'],
            'image_path' => $imagePath,
            'order' => $data['order'] ?? 0,
            'is_published' => $data['is_published'] ?? false,
        ];

        $press_item->update($payload);
        return redirect()->route('admin.press-items.index')->with('status', 'Press item updated');
    }

    public function destroy(PressItem $press_item)
    {
        if ($press_item->image_path) {
            Storage::disk('public')->delete($press_item->image_path);
        }
        $press_item->delete();
        return redirect()->route('admin.press-items.index')->with('status', 'Press item deleted');
    }

    public function togglePublish(PressItem $press_item)
    {
        $press_item->is_published = !$press_item->is_published;
        $press_item->save();
        return back()->with('status', 'Publish state updated');
    }
}
