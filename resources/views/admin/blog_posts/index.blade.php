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
    <form method="GET" class="mb-4 flex flex-col sm:flex-row gap-3 items-start sm:items-center">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search title, excerpt, author"
            class="w-full sm:w-72 border rounded-lg px-3 py-2" />
        <select name="status" class="border rounded-lg px-3 py-2">
            <option value="">All statuses</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg">Filter</button>
        @if (request()->hasAny(['q', 'status']))
            <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-gray-600 underline">Reset</a>
        @endif
    </form>
    <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5 overflow-hidden">
        <table class="min-w-full">
            <thead>
                <tr class="text-left bg-gray-50 border-b">
                    <th class="p-3 text-sm font-semibold text-gray-600">Title</th>
                    <th class="p-3 text-sm font-semibold text-gray-600">Cover</th>
                    <th class="p-3 text-sm font-semibold text-gray-600">Slug</th>
                    <th class="p-3 text-sm font-semibold text-gray-600">Published</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">
                            <div class="font-medium">{{ $post->title }}</div>
                            <div class="text-xs text-gray-500">{{ $post->author ?? 'DgnRavePay Team' }}</div>
                        </td>
                        <td class="p-3">
                            @if ($post->cover_image_path)
                                <img src="{{ asset('storage/' . $post->cover_image_path) }}" alt="cover"
                                    class="h-10 w-16 object-cover rounded">
                            @endif
                        </td>
                        <td class="p-3 text-sm text-gray-700">{{ $post->slug }}</td>
                        <td class="p-3">
                            @if ($post->is_published)
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-green-50 text-green-700 ring-1 ring-green-200">Published</span>
                            @else
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">Draft</span>
                            @endif
                        </td>
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
                                x-data @click="$dispatch('open-modal', 'delete-blog-{{ $post->id }}')">Delete</button>

                            <x-modal name="delete-blog-{{ $post->id }}">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold">Delete blog post</h3>
                                    <p class="text-gray-600 mt-1">Are you sure you want to delete "{{ $post->title }}"?
                                        This
                                        action cannot be undone.</p>
                                    <div class="mt-6 flex justify-end gap-3">
                                        <button class="px-4 py-2 rounded-lg bg-gray-100"
                                            x-on:click="$dispatch('close-modal', 'delete-blog-{{ $post->id }}')">Cancel</button>
                                        <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-4 py-2 rounded-lg bg-red-600 text-white">Delete</button>
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
    <div class="mt-4">{{ $posts->links() }}</div>
@endsection
