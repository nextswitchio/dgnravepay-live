@extends('admin.layout')
@section('page_title', 'FAQs')
@section('page_subtitle', 'Manage frequently asked questions')
@section('page_actions')
    <a href="{{ route('admin.faqs.create') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary/90">New
        FAQ</a>
@endsection
@section('content')
    <form method="GET" class="mb-4 flex flex-col sm:flex-row gap-3 items-start sm:items-center">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search questions and answers"
            class="w-full sm:w-72 border rounded-lg px-3 py-2" />
        <select name="status" class="border rounded-lg px-3 py-2">
            <option value="">All statuses</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg">Filter</button>
        @if (request()->hasAny(['q', 'status']))
            <a href="{{ route('admin.faqs.index') }}" class="text-sm text-gray-600 underline">Reset</a>
        @endif
    </form>
    <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left bg-gray-50 border-b">
                        <th class="p-3 text-sm font-semibold text-gray-600">Question</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Published</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Last updated</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $faq->question }}</td>
                            <td class="p-3">
                                @if ($faq->is_published)
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-green-50 text-green-700 ring-1 ring-green-200">Published</span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">Draft</span>
                                @endif
                            </td>
                            <td class="p-3 text-sm text-gray-600">{{ optional($faq->updated_at)->diffForHumans() }}</td>
                            <td class="p-3 text-right space-x-2">
                                <form action="{{ route('admin.faqs.toggle-publish', $faq) }}" method="POST" class="inline"
                                    onsubmit="return {{ $faq->is_published ? 'confirm(\'Unpublish this FAQ?\')' : 'true' }};">
                                    @csrf
                                    <button
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm {{ $faq->is_published ? 'bg-amber-600 hover:bg-amber-500' : 'bg-green-600 hover:bg-green-500' }} text-white">
                                        {{ $faq->is_published ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>
                                <button type="button"
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-gray-100 text-gray-800 hover:bg-gray-200"
                                    onclick="navigator.clipboard.writeText('{{ $faq->question }} - {{ url('/#faq-anchor') }}');this.innerText='Copied';setTimeout(()=>this.innerText='Copy link',1200);">Copy
                                    link</button>
                                <a href="{{ route('admin.faqs.edit', $faq) }}"
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-blue-600 text-white hover:bg-blue-500">Edit</a>
                                <button
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-red-600 text-white hover:bg-red-500"
                                    x-data
                                    @click="$dispatch('open-modal', 'delete-faq-{{ $faq->id }}')">Delete</button>

                                <x-modal name="delete-faq-{{ $faq->id }}">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold">Delete FAQ</h3>
                                        <p class="text-gray-600 mt-1">Are you sure you want to delete this FAQ? This action
                                            cannot
                                            be undone.</p>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button class="px-4 py-2 rounded-lg bg-gray-100"
                                                x-on:click="$dispatch('close-modal', 'delete-faq-{{ $faq->id }}')">Cancel</button>
                                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST"
                                                onsubmit="return confirm('Delete this FAQ permanently?');">
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
    </div>
    <div class="mt-4">{{ $faqs->links() }}</div>
@endsection
