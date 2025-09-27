@extends('admin.layout')
@section('page_title', 'Blog Posts')
@section('page_subtitle', 'Create, edit and publish articles')
@section('page_actions')
    <a href="{{ route('admin.blog-posts.create') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary/90">
        <span>New Post</span>
    </a>
@endsection
@section('content')
    <form method="GET" class="mb-3 flex flex-col sm:flex-row gap-3 items-start sm:items-center">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search title, excerpt, author"
            class="w-full sm:w-72 border rounded-lg px-3 py-2" />
        <select name="status" class="border rounded-lg px-3 py-2">
            <option value="">All statuses</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <select name="featured" class="border rounded-lg px-3 py-2">
            <option value="">All featured</option>
            <option value="featured" {{ request('featured') === 'featured' ? 'selected' : '' }}>Featured only</option>
            <option value="not_featured" {{ request('featured') === 'not_featured' ? 'selected' : '' }}>Not featured
            </option>
        </select>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg">Filter</button>
        @if (request()->hasAny(['q', 'status', 'featured']))
            <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-gray-600 underline">Reset</a>
        @endif
    </form>

    <div x-data="{
        cols: JSON.parse(localStorage.getItem('admin_blog_cols') || '{}')
    }" x-init="cols = Object.assign({ cover: true, slug: true, tags: true, pubAt: true, updated: true }, cols);
    $watch('cols', v => localStorage.setItem('admin_blog_cols', JSON.stringify(v)))">
        <div class="mb-2 flex justify-end">
            <div class="relative" x-data="{ open: false }">
                <button type="button" @click="open=!open"
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-sm bg-gray-100 hover:bg-gray-200">Columns</button>
                <div x-show="open" @click.outside="open=false"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow ring-1 ring-black/5 p-3 z-10">
                    <label class="flex items-center gap-2 text-sm"><input type="checkbox" x-model="cols.cover">
                        Cover</label>
                    <label class="flex items-center gap-2 text-sm mt-1"><input type="checkbox" x-model="cols.slug">
                        Slug</label>
                    <label class="flex items-center gap-2 text-sm mt-1"><input type="checkbox" x-model="cols.tags">
                        Tags</label>
                    <label class="flex items-center gap-2 text-sm mt-1"><input type="checkbox" x-model="cols.pubAt">
                        Published at</label>
                    <label class="flex items-center gap-2 text-sm mt-1"><input type="checkbox" x-model="cols.updated"> Last
                        updated</label>
                </div>
            </div>
        </div>

        <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left bg-gray-50 border-b">
                            <th class="p-3 text-sm font-semibold text-gray-600">Title</th>
                            <th class="p-3 text-sm font-semibold text-gray-600" :class="!cols.cover ? 'hidden' : ''">Cover
                            </th>
                            <th class="p-3 text-sm font-semibold text-gray-600" :class="!cols.slug ? 'hidden' : ''">Slug
                            </th>
                            <th class="p-3 text-sm font-semibold text-gray-600" :class="!cols.tags ? 'hidden' : ''">Tags
                            </th>
                            <th class="p-3 text-sm font-semibold text-gray-600">Published</th>
                            <th class="p-3 text-sm font-semibold text-gray-600" :class="!cols.pubAt ? 'hidden' : ''">
                                Published at</th>
                            <th class="p-3 text-sm font-semibold text-gray-600" :class="!cols.updated ? 'hidden' : ''">Last
                                updated</th>
                            <th class="p-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">
                                    <div class="font-medium flex items-center gap-2">
                                        <span>{{ $post->title }}</span>
                                        @if ($post->is_featured)
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-yellow-100 text-yellow-800 ring-1 ring-yellow-200">Featured</span>
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500">{{ $post->author ?? 'DgnRavePay Team' }}</div>
                                </td>
                                <td class="p-3" :class="!cols.cover ? 'hidden' : ''">
                                    @if ($post->cover_image_path)
                                        <img src="{{ asset('storage/' . $post->cover_image_path) }}" alt="cover"
                                            class="h-10 w-16 object-cover rounded">
                                    @endif
                                </td>
                                <td class="p-3 text-sm text-gray-700" :class="!cols.slug ? 'hidden' : ''">
                                    <div class="flex items-center gap-2">
                                        <span class="truncate max-w-[200px]"
                                            title="{{ $post->slug }}">{{ $post->slug }}</span>
                                        <button type="button"
                                            class="text-xs px-2 py-1 rounded bg-gray-100 hover:bg-gray-200"
                                            onclick="navigator.clipboard.writeText('{{ url('/blog/' . $post->slug) }}');this.innerText='Copied';setTimeout(()=>this.innerText='Copy link',1200);">Copy
                                            link</button>
                                        <button type="button"
                                            class="text-xs px-2 py-1 rounded bg-gray-100 hover:bg-gray-200"
                                            onclick="navigator.clipboard.writeText('{{ $post->slug }}');this.innerText='Copied';setTimeout(()=>this.innerText='Copy slug',1200);">Copy
                                            slug</button>
                                    </div>
                                </td>
                                <td class="p-3" :class="!cols.tags ? 'hidden' : ''">
                                    @if ($post->relationLoaded('tags'))
                                        <div class="flex flex-wrap gap-1">
                                            @forelse($post->tags as $tag)
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">{{ $tag->name }}</span>
                                            @empty
                                                <span class="text-xs text-gray-400">—</span>
                                            @endforelse
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="p-3">
                                    @if ($post->is_published)
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-green-50 text-green-700 ring-1 ring-green-200">Published</span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">Draft</span>
                                    @endif
                                </td>
                                <td class="p-3 text-sm text-gray-600" :class="!cols.pubAt ? 'hidden' : ''"
                                    title="{{ optional($post->published_at)->toDayDateTimeString() }}">
                                    {{ optional($post->published_at)->format('Y-m-d H:i') ?? '—' }}</td>
                                <td class="p-3 text-sm text-gray-600" :class="!cols.updated ? 'hidden' : ''">
                                    {{ optional($post->updated_at)->diffForHumans() }}</td>
                                <td class="p-3 text-right space-x-2">
                                    <form action="{{ route('admin.blog-posts.toggle-publish', $post) }}" method="POST"
                                        class="inline"
                                        onsubmit="return {{ $post->is_published ? 'confirm(\'Unpublish this post?\')' : 'true' }};">
                                        @csrf
                                        <button
                                            class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm {{ $post->is_published ? 'bg-amber-600 hover:bg-amber-500' : 'bg-green-600 hover:bg-green-500' }} text-white">
                                            {{ $post->is_published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.blog-posts.edit', $post) }}"
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-blue-600 text-white hover:bg-blue-500">Edit</a>
                                    <button
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-red-600 text-white hover:bg-red-500"
                                        x-data
                                        @click="$dispatch('open-modal', 'delete-blog-{{ $post->id }}')">Delete</button>

                                    <x-modal name="delete-blog-{{ $post->id }}">
                                        <div class="p-6">
                                            <h3 class="text-lg font-semibold">Delete blog post</h3>
                                            <p class="text-gray-600 mt-1">Are you sure you want to delete
                                                "{{ $post->title }}"?
                                                This
                                                action cannot be undone.</p>
                                            <div class="mt-6 flex justify-end gap-3">
                                                <button class="px-4 py-2 rounded-lg bg-gray-100"
                                                    x-on:click="$dispatch('close-modal', 'delete-blog-{{ $post->id }}')">Cancel</button>
                                                <form action="{{ route('admin.blog-posts.destroy', $post) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete this blog post permanently?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="px-4 py-2 rounded-lg bg-red-600 text-white">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4">{{ $posts->links() }}</div>
@endsection
