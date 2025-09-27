@extends('admin.layout')
@section('page_title', 'Edit Blog Post')
@section('page_actions')
    <a href="{{ route('admin.blog-posts.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg ring-1 ring-gray-200 hover:bg-gray-200">Back</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.blog-posts.update', $post) }}" enctype="multipart/form-data"
        class="space-y-4 bg-white/90 backdrop-blur p-5 md:p-6 rounded-xl shadow ring-1 ring-black/5">
        @csrf
        @method('PUT')
        <div>
            <label class="block" for="title">Title</label>
            <input id="title" name="title" class="w-full border p-2" value="{{ old('title', $post->title) }}"
                required />
        </div>
        <div>
            <label class="block" for="slug">Slug</label>
            <input id="slug" name="slug" class="w-full border p-2" value="{{ old('slug', $post->slug) }}"
                required />
        </div>
        <div>
            <label class="block" for="author">Author</label>
            <input id="author" name="author" class="w-full border p-2" value="{{ old('author', $post->author) }}" />
        </div>
        <div>
            <label class="block" for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" class="w-full border p-2">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>
        <div>
            <label class="block" for="content">Content</label>
            <textarea id="content" name="content" class="w-full border p-2 h-64 js-richtext" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div>
            <label class="block" for="cover_image">Featured Image</label>
            @if ($post->cover_image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->cover_image_path) }}" alt="Current cover"
                        class="h-24 rounded border">
                </div>
            @endif
            <input id="cover_image" type="file" name="cover_image" accept="image/*" class="w-full border p-2" />
            <p class="text-xs text-gray-500 mt-1">Uploading a new image will replace the existing one. Max 2MB.</p>
        </div>
        <div>
            <label class="block" for="tags">Tags (comma-separated)</label>
            @php $tagsValue = old('tags', optional($post->tags)->pluck('name')->implode(', ')); @endphp
            <input id="tags" name="tags" class="w-full border p-2" value="{{ $tagsValue }}"
                placeholder="e.g. savings, cards, fx" />
            <p class="text-xs text-gray-500 mt-1">Use simple words, lowercase preferred.</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_featured" value="1" id="is_featured"
                {{ old('is_featured', $post->is_featured) ? 'checked' : '' }} />
            <label for="is_featured">Featured</label>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" id="is_published"
                {{ old('is_published', $post->is_published) ? 'checked' : '' }} />
            <label for="is_published">Published</label>
        </div>
        <div>
            <label class="block" for="published_at">Published At</label>
            <input id="published_at" type="datetime-local" name="published_at" class="border p-2"
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
