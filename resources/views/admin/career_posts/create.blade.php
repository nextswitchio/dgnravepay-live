@extends('admin.layout')
@section('content')
    <h1 class="text-2xl font-bold mb-4">New Career Post</h1>
    <form method="POST" action="{{ route('admin.career-posts.store') }}" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 rounded shadow">
        @csrf
        <div>
            <label class="block" for="title">Title</label>
            <input id="title" name="title" class="w-full border p-2" required />
        </div>
        <div>
            <label class="block" for="slug">Slug (optional)</label>
            <input id="slug" name="slug" class="w-full border p-2" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block" for="location">Location</label>
                <input id="location" name="location" class="w-full border p-2" />
            </div>
            <div>
                <label class="block" for="department">Department</label>
                <input id="department" name="department" class="w-full border p-2" />
            </div>
            <div>
                <label class="block" for="employment_type">Employment Type</label>
                <select id="employment_type" name="employment_type" class="w-full border p-2">
                    <option value="full_time">Full-time</option>
                    <option value="part_time">Part-time</option>
                    <option value="contract">Contract</option>
                    <option value="internship">Internship</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block" for="summary">Summary</label>
            <textarea id="summary" name="summary" class="w-full border p-2"></textarea>
        </div>
        <div>
            <label class="block" for="description">Description</label>
            <textarea id="description" name="description" class="w-full border p-2 h-64 js-richtext" required></textarea>
        </div>
        <div>
            <label class="block" for="cover_image">Featured Image</label>
            <input id="cover_image" type="file" name="cover_image" accept="image/*" class="w-full border p-2" />
            <p class="text-xs text-gray-500 mt-1">Max 2MB. JPG/PNG.</p>
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
