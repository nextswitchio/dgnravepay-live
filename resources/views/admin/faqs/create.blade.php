@extends('admin.layout')
@section('content')
<h1 class="text-2xl font-bold mb-4">New FAQ</h1>
<form method="POST" action="{{ route('admin.faqs.store') }}" class="space-y-4 bg-white p-4 rounded shadow">
  @csrf
  <div>
    <label class="block">Question</label>
    <input name="question" class="w-full border p-2" required />
  </div>
  <div>
    <label class="block">Answer</label>
    <textarea name="answer" class="w-full border p-2 h-48" required></textarea>
  </div>
  <div class="flex items-center gap-2">
    <input type="checkbox" name="is_published" value="1" id="is_published" checked />
    <label for="is_published">Published</label>
  </div>
  <button class="px-4 py-2 bg-primary text-white rounded">Save</button>
</form>
@endsection
