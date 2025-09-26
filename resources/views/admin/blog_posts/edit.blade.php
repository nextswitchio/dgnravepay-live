@extends('admin.layout')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Blog Post</h1>
    <form method="POST" action="{{ route('admin.blog-posts.update', $post) }}" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 rounded shadow">
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
            <textarea name="content" class="w-full border p-2 h-64 js-richtext" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div>
            <label class="block">Featured Image</label>
            @if ($post->cover_image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->cover_image_path) }}" alt="Current cover"
                        class="h-24 rounded border">
                </div>
            @endif
            <input type="file" name="cover_image" accept="image/*" class="w-full border p-2" />
            <p class="text-xs text-gray-500 mt-1">Uploading a new image will replace the existing one. Max 2MB.</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" id="is_published"
                {{ old('is_published', $post->is_published) ? 'checked' : '' }} />
            <label for="is_published">Published</label>
        </div>
        <div>
            <label class="block">Published At</label>
            <input type="datetime-local" name="published_at" class="border p-2"
                value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}" />
        </div>
        <button class="px-4 py-2 bg-primary text-white rounded">Update</button>
    </form>
    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
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
                quill.clipboard.dangerouslyPasteHTML(textarea.value || '');
                quill.on('text-change', function() {
                    textarea.value = quill.root.innerHTML;
                });
            })();
        </script>
    @endpush
@endsection
