@extends('admin.layout')
@section('page_title', 'Press Items')
@section('page_subtitle', 'Manage press and media content')
@section('page_actions')
    <a href="{{ route('admin.press-items.create') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary/90">New
        Press Item</a>
@endsection
@section('content')
    <form method="GET" class="mb-4 flex flex-col sm:flex-row gap-3 items-start sm:items-center flex-wrap">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search title and description"
            class="w-full sm:w-72 border rounded-lg px-3 py-2" />
        <select name="category" class="border rounded-lg px-3 py-2">
            <option value="">All categories</option>
            @foreach (\App\Models\PressItem::CATEGORIES as $key => $label)
                <option value="{{ $key }}" {{ request('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <select name="status" class="border rounded-lg px-3 py-2">
            <option value="">All statuses</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg">Filter</button>
        @if (request()->hasAny(['q', 'category', 'status']))
            <a href="{{ route('admin.press-items.index') }}" class="text-sm text-gray-600 underline">Reset</a>
        @endif
    </form>
    <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left bg-gray-50 border-b">
                        <th class="p-3 text-sm font-semibold text-gray-600">Image</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Title</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Category</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Order</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Published</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Last updated</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                        class="w-16 h-10 object-cover rounded">
                                @else
                                    <div class="w-16 h-10 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-xs">
                                        No image
                                    </div>
                                @endif
                            </td>
                            <td class="p-3">{{ $item->title }}</td>
                            <td class="p-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-50 text-blue-700 ring-1 ring-blue-200">
                                    {{ \App\Models\PressItem::CATEGORIES[$item->category] ?? $item->category }}
                                </span>
                            </td>
                            <td class="p-3 text-sm text-gray-600">{{ $item->order }}</td>
                            <td class="p-3">
                                @if ($item->is_published)
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-green-50 text-green-700 ring-1 ring-green-200">Published</span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">Draft</span>
                                @endif
                            </td>
                            <td class="p-3 text-sm text-gray-600">{{ optional($item->updated_at)->diffForHumans() }}</td>
                            <td class="p-3 text-right space-x-2">
                                <form action="{{ route('admin.press-items.toggle-publish', $item) }}" method="POST" class="inline"
                                    onsubmit="return {{ $item->is_published ? 'confirm(\'Unpublish this item?\')' : 'true' }};">
                                    @csrf
                                    <button
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm {{ $item->is_published ? 'bg-amber-600 hover:bg-amber-500' : 'bg-green-600 hover:bg-green-500' }} text-white">
                                        {{ $item->is_published ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.press-items.edit', $item) }}"
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-blue-600 text-white hover:bg-blue-500">Edit</a>
                                <button
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-red-600 text-white hover:bg-red-500"
                                    x-data
                                    @click="$dispatch('open-modal', 'delete-press-item-{{ $item->id }}')">Delete</button>

                                <x-modal name="delete-press-item-{{ $item->id }}">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold">Delete Press Item</h3>
                                        <p class="text-gray-600 mt-1">Are you sure you want to delete this press item? This action
                                            cannot be undone.</p>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button class="px-4 py-2 rounded-lg bg-gray-100"
                                                x-on:click="$dispatch('close-modal', 'delete-press-item-{{ $item->id }}')">Cancel</button>
                                            <form action="{{ route('admin.press-items.destroy', $item) }}" method="POST"
                                                onsubmit="return confirm('Delete this press item permanently?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-4 py-2 rounded-lg bg-red-600 text-white">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </x-modal>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-gray-500">
                                No press items found. <a href="{{ route('admin.press-items.create') }}" class="text-primary underline">Create your first one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
@endsection
