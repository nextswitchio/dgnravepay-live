@extends('admin.layout')
@section('content')
    <h1 class="text-2xl font-bold mb-4">New Testimonial</h1>
    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 rounded shadow">
        @csrf
        <div>
            <label class="block">Name</label>
            <input name="name" class="w-full border p-2" required />
        </div>
        <div>
            <label class="block">Content</label>
            <textarea name="content" class="w-full border p-2 h-40 js-richtext" required></textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block">Rating (1-5)</label>
                <input type="number" min="1" max="5" name="rating" class="w-full border p-2"
                    value="5" />
            </div>
            <div>
                <label class="block">Variant</label>
                <select name="variant" class="w-full border p-2">
                    <option value="white">White card</option>
                    <option value="yellow">Yellow card</option>
                </select>
            </div>
            <div>
                <label class="block">Icon</label>
                <select name="icon" class="w-full border p-2">
                    <option value="">None</option>
                    <option value="play">Play</option>
                    <option value="bag">Bag</option>
                    <option value="instagram">Instagram</option>
                    <option value="facebook">Facebook</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block">Avatar</label>
            <input type="file" name="avatar" accept="image/*" class="w-full border p-2" />
            <p class="text-xs text-gray-500 mt-1">Max 2MB. JPG/PNG.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_published" value="1" /> <span>Published</span>
            </label>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1" /> <span>Featured</span>
            </label>
            <div>
                <label class="block">Sort order</label>
                <input type="number" name="sort_order" class="w-full border p-2" value="0" />
            </div>
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
                container.style.minHeight = '200px';
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
