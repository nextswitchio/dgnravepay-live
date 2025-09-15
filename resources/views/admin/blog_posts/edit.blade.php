@extends('admin.layout')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Blog Post</h1>
<form method="POST" action="{{ route('admin.blog-posts.update', $post) }}" class="space-y-4 bg-white p-4 rounded shadow">
  @csrf
  @method('PUT')
  <div>
    <label class="block">Title</label>
    <input name="title" class="w-full border p-2" value="{{ old('title', $post->title) }}" required />
  </div>
  <div>
    <label class="block">Slug</label>
    <input name="slug" class="w-full border p-2" value="{{ old('slug', $post->slug) }}" required />
  </div>
  <div>
    <label class="block">Author</label>
    <input name="author" class="w-full border p-2" value="{{ old('author', $post->author) }}" />
  </div>
  <div>
    <label class="block">Excerpt</label>
    <textarea name="excerpt" class="w-full border p-2">{{ old('excerpt', $post->excerpt) }}</textarea>
  </div>
  <div>
    <label class="block">Content</label>
    <textarea name="content" class="w-full border p-2 h-48" required>{{ old('content', $post->content) }}</textarea>
  </div>
  <div>
    <label class="block">Cover Image Path</label>
    <input name="cover_image_path" class="w-full border p-2" value="{{ old('cover_image_path', $post->cover_image_path) }}" />
  </div>
  <div class="flex items-center gap-2">
    <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $post->is_published) ? 'checked' : '' }} />
    <label for="is_published">Published</label>
  </div>
  <div>
    <label class="block">Published At</label>
    <input type="datetime-local" name="published_at" class="border p-2" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}" />
  </div>
  <button class="px-4 py-2 bg-primary text-white rounded">Update</button>
</form>
@endsection
