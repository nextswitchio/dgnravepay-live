@extends('admin.layout')
@section('page_title', 'Branches')
@section('page_subtitle', 'Manage branch locations')
@section('page_actions')
    <a href="{{ route('admin.branches.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary/90">New Branch</a>
@endsection
@section('content')
    <form method="GET" class="mb-4 flex flex-col sm:flex-row gap-3 items-start sm:items-center flex-wrap">
        <select name="state_id" class="border rounded-lg px-3 py-2">
            <option value="">All states</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}" {{ request('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
            @endforeach
        </select>
        <select name="status" class="border rounded-lg px-3 py-2">
            <option value="">All statuses</option>
            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg">Filter</button>
        @if (request()->hasAny(['state_id', 'status']))
            <a href="{{ route('admin.branches.index') }}" class="text-sm text-gray-600 underline">Reset</a>
        @endif
    </form>
    <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left bg-gray-50 border-b">
                        <th class="p-3 text-sm font-semibold text-gray-600">State</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Branch Name</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Address</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Contact</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Order</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Active</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($branches as $branch)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs bg-blue-50 text-blue-700">{{ $branch->state->name }}</span>
                            </td>
                            <td class="p-3 font-medium">{{ $branch->name }}</td>
                            <td class="p-3 text-sm text-gray-600">{{ Str::limit($branch->address, 50) }}</td>
                            <td class="p-3 text-xs text-gray-600">
                                @if ($branch->email)<div>{{ $branch->email }}</div>@endif
                                @if ($branch->phone)<div>{{ $branch->phone }}</div>@endif
                            </td>
                            <td class="p-3 text-sm text-gray-600">{{ $branch->order }}</td>
                            <td class="p-3">
                                @if ($branch->is_active)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-50 text-green-700 ring-1 ring-green-200">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 ring-1 ring-gray-200">Inactive</span>
                                @endif
                            </td>
                            <td class="p-3 text-right space-x-2">
                                <form action="{{ route('admin.branches.toggle-active', $branch) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm {{ $branch->is_active ? 'bg-amber-600 hover:bg-amber-500' : 'bg-green-600 hover:bg-green-500' }} text-white">
                                        {{ $branch->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <a href="{{ route('admin.branches.edit', $branch) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-blue-600 text-white hover:bg-blue-500">Edit</a>
                                <button class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-red-600 text-white hover:bg-red-500" x-data @click="$dispatch('open-modal', 'delete-branch-{{ $branch->id }}')">Delete</button>
                                <x-modal name="delete-branch-{{ $branch->id }}">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold">Delete Branch</h3>
                                        <p class="text-gray-600 mt-1">Are you sure you want to delete this branch?</p>
                                        <div class="mt-6 flex justify-end gap-3">
                                            <button class="px-4 py-2 rounded-lg bg-gray-100" x-on:click="$dispatch('close-modal', 'delete-branch-{{ $branch->id }}')">Cancel</button>
                                            <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST">
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
                            <td colspan="7" class="p-8 text-center text-gray-500">No branches found. <a href="{{ route('admin.branches.create') }}" class="text-primary underline">Create your first one</a>.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $branches->links() }}</div>
@endsection
