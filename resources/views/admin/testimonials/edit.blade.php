@extends('admin.layout')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Testimonial</h1>
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data"
        class="space-y-4 bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label class="block">Name</label>
            <input name="name" class="w-full border p-2" required value="{{ old('name', $testimonial->name) }}" />
        </div>
        <div>
            <label class="block">Content</label>
            <textarea name="content" class="w-full border p-2 h-40 js-richtext" required>{{ old('content', $testimonial->content) }}</textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block">Rating (1-5)</label>
                <input type="number" min="1" max="5" name="rating" class="w-full border p-2"
                    value="{{ old('rating', $testimonial->rating) }}" />
            </div>
            <div>
                <label class="block">Variant</label>
                <select name="variant" class="w-full border p-2">
                    <option value="white" @selected(old('variant', $testimonial->variant) === 'white')>White card</option>
                    <option value="yellow" @selected(old('variant', $testimonial->variant) === 'yellow')>Yellow card</option>
                </select>
            </div>
            <div>
                <label class="block">Icon</label>
                <select name="icon" class="w-full border p-2">
                    @php $icon = old('icon', $testimonial->icon); @endphp
                    <option value="" @selected($icon === null || $icon === '')>None</option>
                    <option value="play" @selected($icon === 'play')>Play</option>
                    <option value="bag" @selected($icon === 'bag')>Bag</option>
                    <option value="instagram" @selected($icon === 'instagram')>Instagram</option>
                    <option value="facebook" @selected($icon === 'facebook')>Facebook</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block">Avatar</label>
            <input type="file" name="avatar" accept="image/*" class="w-full border p-2" />
            @if ($testimonial->avatar_url)
                <img src="{{ $testimonial->avatar_url }}" class="h-16 w-16 rounded-full object-cover mt-2" />
            @endif
            <p class="text-xs text-gray-500 mt-1">Max 2MB. JPG/PNG.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $testimonial->is_published)) />
                <span>Published</span>
            </label>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $testimonial->is_featured)) />
                <span>Featured</span>
            </label>
            <div>
                <label class="block">Sort order</label>
                <input type="number" name="sort_order" class="w-full border p-2"
                    value="{{ old('sort_order', $testimonial->sort_order) }}" />
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
