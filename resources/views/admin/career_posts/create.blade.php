@extends('admin.layout')
@section('content')
<h1 class="text-2xl font-bold mb-4">New Career Post</h1>
<form method="POST" action="{{ route('admin.career-posts.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
  @csrf
  <div>
    <label class="block">Title</label>
    <input name="title" class="w-full border p-2" required />
  </div>
  <div>
    <label class="block">Slug (optional)</label>
    <input name="slug" class="w-full border p-2" />
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block">Location</label>
      <input name="location" class="w-full border p-2" />
    </div>
    <div>
      <label class="block">Department</label>
      <input name="department" class="w-full border p-2" />
    </div>
    <div>
      <label class="block">Employment Type</label>
      <select name="employment_type" class="w-full border p-2">
        <option value="full_time">Full-time</option>
        <option value="part_time">Part-time</option>
        <option value="contract">Contract</option>
        <option value="internship">Internship</option>
      </select>
    </div>
  </div>
  <div>
    <label class="block">Summary</label>
    <textarea name="summary" class="w-full border p-2"></textarea>
  </div>
  <div>
    <label class="block">Description</label>
    <textarea name="description" class="w-full border p-2 h-48" required></textarea>
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
