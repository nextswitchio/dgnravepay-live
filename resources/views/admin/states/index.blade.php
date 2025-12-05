@extends('admin.layout')
@section('page_title', 'States')
@section('page_subtitle', 'Manage state locations')
@section('page_actions')
    <a href="{{ route('admin.states.create') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary/90">New State</a>
@endsection
@section('content')
    <form method="GET" class="mb-4 flex flex-col sm:flex-row gap-3 items-start sm:items-center">
        <select name="status" class="border rounded-lg px-3 py-2">
            <option value="">All statuses</option>
            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg">Filter</button>
        @if (request()->has('status'))
            <a href="{{ route('admin.states.index') }}" class="text-sm text-gray-600 underline">Reset</a>
        @endif
    </form>
    <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left bg-gray-50 border-b">
                        <th class="p-3 text-sm font-semibold text-gray-600">Name</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Slug</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Order</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Branches</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Active</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($states as $state)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 font-medium">{{ $state->name }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ $state->slug }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ $state->order }}</td>
                            <td class="p-3 text-sm text-gray-600">
                                <a href="{{ route('admin.branches.index', ['state_id' => $state->id]) }}" class="text-primary underline">
                                    {{ $state->branches_count }} {{ Str::plural('branch', $state->branches_count) }}
                                </a>
                            </td>
                            <td class="p-3">
                                @if ($state->is_active)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-50 text-green-700 ring-1 ring-green-200">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">Inactive</span>
                                @endif
                            </td>
                            <td class="p-3 text-right space-x-2">
                                <form action="{{ route('admin.states.toggle-active', $state) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm {{ $state->is_active ? 'bg-amber-600 hover:bg-amber-500' : 'bg-green-600 hover:bg-green-500' }} text-white">
                                        {{ $state->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.states.edit', $state) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-blue-600 text-white hover:bg-blue-500">Edit</a>
                                <button class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-red-600 text-white hover:bg-red-500" x-data @click="$dispatch('open-modal', 'delete-state-{{ $state->id }}')">Delete</button>
                                <x-modal name="delete-state-{{ $state->id }}">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold">Delete State</h3>
                                        <p class="text-gray-600 mt-1">Are you sure? This will delete all branches in this state.</p>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button class="px-4 py-2 rounded-lg bg-gray-100" x-on:click="$dispatch('close-modal', 'delete-state-{{ $state->id }}')">Cancel</button>
                                            <form action="{{ route('admin.states.destroy', $state) }}" method="POST">
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
                            <td colspan="6" class="p-8 text-center text-gray-500">No states found. <a href="{{ route('admin.states.create') }}" class="text-primary underline">Create your first one</a>.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $states->links() }}</div>
@endsection
