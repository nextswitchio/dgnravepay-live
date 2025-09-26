@extends('admin.layout')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Career Posts</h1>
        <a href="{{ route('admin.career-posts.create') }}" class="px-3 py-2 bg-primary text-white rounded">New</a>
    </div>
    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="text-left">
                <th class="p-2">Title</th>
                <th class="p-2">Cover</th>
                <th class="p-2">Slug</th>
                <th class="p-2">Department</th>
                <th class="p-2">Type</th>
                <th class="p-2">Published</th>
                <th class="p-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="border-t">
                    <td class="p-2">{{ $post->title }}</td>
                    <td class="p-2">
                        @if ($post->cover_image_path)
                            <img src="{{ asset('storage/' . $post->cover_image_path) }}" alt="cover"
                                class="h-10 w-16 object-cover rounded">
                        @endif
                    </td>
                    <td class="p-2">{{ $post->slug }}</td>
                    <td class="p-2">{{ $post->department }}</td>
                    <td class="p-2">{{ $post->employment_type }}</td>
                    <td class="p-2">{{ $post->is_published ? 'Yes' : 'No' }}</td>
                    <td class="p-2 text-right space-x-2">
                        <a href="{{ route('admin.career-posts.edit', $post) }}" class="text-blue-600">Edit</a>
                        <button class="text-red-600" x-data
                            @click="$dispatch('open-modal', 'delete-career-{{ $post->id }}')">Delete</button>

                        <x-modal name="delete-career-{{ $post->id }}">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold">Delete career post</h3>
                                <p class="text-gray-600 mt-1">Are you sure you want to delete "{{ $post->title }}"? This
                                    action cannot be undone.</p>
                                <div class="mt-6 flex justify-end gap-3">
                                    <button class="px-4 py-2 rounded-lg bg-gray-100"
                                        x-on:click="$dispatch('close-modal', 'delete-career-{{ $post->id }}')">Cancel</button>
                                    <form action="{{ route('admin.career-posts.destroy', $post) }}" method="POST">
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
    <div class="mt-4">{{ $posts->links() }}</div>
@endsection
