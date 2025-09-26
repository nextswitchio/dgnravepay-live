@extends('admin.layout')
@section('content')
    <h1 class="text-2xl font-bold mb-4">New Blog Post</h1>
    <form method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 rounded shadow">
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
            <textarea name="content" class="w-full border p-2 h-64 js-richtext" required></textarea>
        </div>
        <div>
            <label class="block">Featured Image</label>
            <input type="file" name="cover_image" accept="image/*" class="w-full border p-2" />
            <p class="text-xs text-gray-500 mt-1">Max 2MB. JPG/PNG.</p>
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
