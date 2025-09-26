@extends('admin.layout')
@section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="px-3 py-2 bg-primary text-white rounded">New</a>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="text-left text-sm text-gray-600">
                    <th class="p-3">#</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Rating</th>
                    <th class="p-3">Variant</th>
                    <th class="p-3">Published</th>
                    <th class="p-3">Featured</th>
                    <th class="p-3">Sort</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $t)
                    <tr class="border-t">
                        <td class="p-3">{{ $t->id }}</td>
                        <td class="p-3 flex items-center gap-2">
                            @if ($t->avatar_url)
                                <img src="{{ $t->avatar_url }}" alt="{{ $t->name }} avatar"
                                    class="w-8 h-8 rounded-full object-cover" />
                            @endif
                            <div>
                                <div class="font-medium">{{ $t->name }}</div>
                                <div class="text-xs text-gray-500 line-clamp-1">{{ strip_tags($t->content) }}</div>
                            </div>
                        </td>
                        <td class="p-3">{{ $t->rating }}★</td>
                        <td class="p-3">{{ ucfirst($t->variant) }}</td>
                        <td class="p-3">{!! $t->is_published
                            ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Yes</span>'
                            : '<span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded">No</span>' !!}</td>
                        <td class="p-3">{!! $t->is_featured
                            ? '<span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">Yes</span>'
                            : '<span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded">No</span>' !!}</td>
                        <td class="p-3">{{ $t->sort_order }}</td>
                        <td class="p-3 text-right">
                            <a href="{{ route('admin.testimonials.edit', $t) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="inline"
                                onsubmit="return confirm('Delete this testimonial?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $testimonials->links() }}</div>
@endsection
