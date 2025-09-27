@extends('admin.layout')
@section('page_title', 'New FAQ')
@section('page_actions')
    <a href="{{ route('admin.faqs.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg ring-1 ring-gray-200 hover:bg-gray-200">Back</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.faqs.store') }}"
        class="space-y-4 bg-white/90 backdrop-blur p-5 md:p-6 rounded-xl shadow ring-1 ring-black/5">
        @csrf
        <div>
            <label class="block" for="question">Question</label>
            <input id="question" name="question" class="w-full border p-2" required />
        </div>
        <div>
            <label class="block" for="answer">Answer</label>
            <textarea id="answer" name="answer" class="w-full border p-2 h-48" required></textarea>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" id="is_published" checked />
            <label for="is_published">Published</label>
        </div>
        <button class="px-4 py-2 bg-primary text-white rounded">Save</button>
    </form>
@endsection
