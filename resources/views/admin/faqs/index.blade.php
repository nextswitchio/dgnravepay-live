@extends('admin.layout')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">FAQs</h1>
        <a href="{{ route('admin.faqs.create') }}" class="px-3 py-2 bg-primary text-white rounded">New</a>
    </div>
    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="text-left">
                <th class="p-2">Question</th>
                <th class="p-2">Published</th>
                <th class="p-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr class="border-t">
                    <td class="p-2">{{ $faq->question }}</td>
                    <td class="p-2">{{ $faq->is_published ? 'Yes' : 'No' }}</td>
                    <td class="p-2 text-right space-x-2">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-blue-600">Edit</a>
                        <button class="text-red-600" x-data
                            @click="$dispatch('open-modal', 'delete-faq-{{ $faq->id }}')">Delete</button>

                        <x-modal name="delete-faq-{{ $faq->id }}">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold">Delete FAQ</h3>
                                <p class="text-gray-600 mt-1">Are you sure you want to delete this FAQ? This action cannot
                                    be undone.</p>
                                <div class="mt-6 flex justify-end gap-3">
                                    <button class="px-4 py-2 rounded-lg bg-gray-100"
                                        x-on:click="$dispatch('close-modal', 'delete-faq-{{ $faq->id }}')">Cancel</button>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST">
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
    <div class="mt-4">{{ $faqs->links() }}</div>
@endsection
