@extends('admin.layout')
@section('page_title', 'Edit Press Item')
@section('page_actions')
    <a href="{{ route('admin.press-items.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg ring-1 ring-gray-200 hover:bg-gray-200">Back</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.press-items.update', $item) }}" enctype="multipart/form-data"
        class="space-y-4 bg-white/90 backdrop-blur p-5 md:p-6 rounded-xl shadow ring-1 ring-black/5">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium mb-1" for="title">Title</label>
            <input id="title" name="title" value="{{ old('title', $item->title) }}" class="w-full border rounded-lg p-2" required />
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="description">Description (Optional)</label>
            <textarea id="description" name="description" class="w-full border rounded-lg p-2 h-24">{{ old('description', $item->description) }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="url">Link URL (Optional)</label>
            <input type="url" id="url" name="url" value="{{ old('url', $item->url) }}" placeholder="https://example.com/article" class="w-full border rounded-lg p-2" />
            <p class="text-sm text-gray-500 mt-1">For news items - link to the full article</p>
            @error('url')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="category">Category</label>
            <select id="category" name="category" class="w-full border rounded-lg p-2" required>
                <option value="">Select a category</option>
                @foreach (\App\Models\PressItem::CATEGORIES as $key => $label)
                    <option value="{{ $key }}" {{ old('category', $item->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="image">Image</label>
            @if ($item->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-48 h-32 object-cover rounded">
                    <p class="text-sm text-gray-500 mt-1">Current image</p>
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*" class="w-full border rounded-lg p-2" />
            <p class="text-sm text-gray-500 mt-1">{{ $item->image_path ? 'Upload a new image to replace the current one' : 'Upload an image (JPG or PNG, max 2MB)' }}</p>
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="order">Display Order (Optional)</label>
            <input type="number" id="order" name="order" value="{{ old('order', $item->order) }}" class="w-full border rounded-lg p-2" />
            <p class="text-sm text-gray-500 mt-1">Lower numbers appear first</p>
            @error('order')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $item->is_published) ? 'checked' : '' }} />
            <label for="is_published" class="font-medium">Published</label>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Press Item</button>
            <a href="{{ route('admin.press-items.index') }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200">Cancel</a>
        </div>
    </form>
@endsection
