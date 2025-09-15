@extends('admin.layout')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Career Post</h1>
<form method="POST" action="{{ route('admin.career-posts.update', $post) }}" class="space-y-4 bg-white p-4 rounded shadow">
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
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block">Location</label>
      <input name="location" class="w-full border p-2" value="{{ old('location', $post->location) }}" />
    </div>
    <div>
      <label class="block">Department</label>
      <input name="department" class="w-full border p-2" value="{{ old('department', $post->department) }}" />
    </div>
    <div>
      <label class="block">Employment Type</label>
      <select name="employment_type" class="w-full border p-2">
        @foreach (['full_time'=>'Full-time','part_time'=>'Part-time','contract'=>'Contract','internship'=>'Internship'] as $val=>$label)
          <option value="{{ $val }}" {{ old('employment_type', $post->employment_type)===$val?'selected':'' }}>{{ $label }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div>
    <label class="block">Summary</label>
    <textarea name="summary" class="w-full border p-2">{{ old('summary', $post->summary) }}</textarea>
  </div>
  <div>
    <label class="block">Description</label>
    <textarea name="description" class="w-full border p-2 h-48" required>{{ old('description', $post->description) }}</textarea>
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
