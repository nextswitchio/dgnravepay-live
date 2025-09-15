@extends('admin.layout')
@section('content')
<h1 class="text-2xl font-bold mb-4">New Blog Post</h1>
<form method="POST" action="{{ route('admin.blog-posts.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
  @csrf
  <div>
    <label class="block">Title</label>
    <input name="title" class="w-full border p-2" required />
  </div>
  <div>
    <label class="block">Slug (optional)</label>
    <input name="slug" class="w-full border p-2" />
  </div>
  <div>
    <label class="block">Author</label>
    <input name="author" class="w-full border p-2" />
  </div>
  <div>
    <label class="block">Excerpt</label>
    <textarea name="excerpt" class="w-full border p-2"></textarea>
  </div>
  <div>
    <label class="block">Content</label>
    <textarea name="content" class="w-full border p-2 h-48" required></textarea>
  </div>
  <div>
    <label class="block">Cover Image Path</label>
    <input name="cover_image_path" class="w-full border p-2" />
  </div>
  <div class="flex items-center gap-2">
    <input type="checkbox" name="is_published" value="1" id="is_published" />
    <label for="is_published">Published</label>
  </div>
  <div>
    <label class="block">Published At</label>
    <input type="datetime-local" name="published_at" class="border p-2" />
  </div>
  <button class="px-4 py-2 bg-primary text-white rounded">Save</button>
</form>
@endsection
