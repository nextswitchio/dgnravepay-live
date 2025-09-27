@extends('admin.layout')
@section('page_title', 'New Blog Post')
@section('page_actions')
    <a href="{{ route('admin.blog-posts.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg ring-1 ring-gray-200 hover:bg-gray-200">Back</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data"
        class="space-y-4 bg-white/90 backdrop-blur p-5 md:p-6 rounded-xl shadow ring-1 ring-black/5">
        @csrf
        <div>
            <label class="block" for="title">Title</label>
            <input id="title" name="title" class="w-full border p-2" required />
        </div>
        <div>
            <label class="block" for="slug">Slug (optional)</label>
            <input id="slug" name="slug" class="w-full border p-2" />
        </div>
        <div>
            <label class="block" for="author">Author</label>
            <input id="author" name="author" class="w-full border p-2" />
        </div>
        <div>
            <label class="block" for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" class="w-full border p-2"></textarea>
        </div>
        <div>
            <label class="block" for="content">Content</label>
            <textarea id="content" name="content" class="w-full border p-2 h-64 js-richtext" required></textarea>
        </div>
        <div>
            <label class="block" for="cover_image">Featured Image</label>
            <input id="cover_image" type="file" name="cover_image" accept="image/*" class="w-full border p-2" />
            <p class="text-xs text-gray-500 mt-1">Max 2MB. JPG/PNG.</p>
        </div>
        <div>
            <label class="block" for="tags">Tags (comma-separated)</label>
            <input id="tags" name="tags" class="w-full border p-2" placeholder="e.g. savings, cards, fx" />
            <p class="text-xs text-gray-500 mt-1">Use simple words, lowercase preferred.</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_featured" value="1" id="is_featured" />
            <label for="is_featured">Featured</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" id="is_published" />
            <label for="is_published">Published</label>
        </div>
        <div>
            <label class="block" for="published_at">Published At</label>
            <input id="published_at" type="datetime-local" name="published_at" class="border p-2" />
        </div>
        <button class="px-4 py-2 bg-primary text-white rounded">Save</button>
    </form>
    @push('head')
        {{-- Quill CSS (CDN) --}}
        <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
        {{-- Quill JS (CDN) and init --}}
        <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
        <script>
            (function() {
                const textarea = document.querySelector('textarea.js-richtext');
                if (!textarea) return;
                const container = document.createElement('div');
                container.style.minHeight = '300px';
                textarea.classList.add('hidden');
                textarea.parentNode.insertBefore(container, textarea);

                const quill = new Quill(container, {
                    theme: 'snow'
                });
                // If editing, load initial content from textarea
                quill.clipboard.dangerouslyPasteHTML(textarea.value || '');
                // Sync back to textarea on change
                quill.on('text-change', function() {
                    textarea.value = quill.root.innerHTML;
                });
            })();
        </script>
    @endpush
@endsection
