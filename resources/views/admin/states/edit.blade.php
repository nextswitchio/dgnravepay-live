@extends('admin.layout')
@section('page_title', 'Edit State')
@section('page_subtitle', '{{ $state->branches_count }} {{ Str::plural("branch", $state->branches_count) }}')
@section('page_actions')
    <a href="{{ route('admin.states.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg ring-1 ring-gray-200 hover:bg-gray-200">Back</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.states.update', $state) }}" class="space-y-4 bg-white/90 backdrop-blur p-5 md:p-6 rounded-xl shadow ring-1 ring-black/5">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium mb-1" for="name">State Name</label>
            <input id="name" name="name" value="{{ old('name', $state->name) }}" class="w-full border rounded-lg p-2" required />
            <p class="text-sm text-gray-500 mt-1">Current slug: {{ $state->slug }}</p>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="order">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', $state->order) }}" class="w-full border rounded-lg p-2" />
            <p class="text-sm text-gray-500 mt-1">Lower numbers appear first</p>
            @error('order')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $state->is_active) ? 'checked' : '' }} />
            <label for="is_active" class="font-medium">Active</label>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update State</button>
            <a href="{{ route('admin.states.index') }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200">Cancel</a>
        </div>
    </form>
    @if ($state->branches_count > 0)
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <p class="text-sm text-blue-800">
                <strong>Note:</strong> This state has {{ $state->branches_count }} {{ Str::plural('branch', $state->branches_count) }}. 
                <a href="{{ route('admin.branches.index', ['state_id' => $state->id]) }}" class="text-primary underline">View branches</a>
            </p>
        </div>
    @endif
@endsection
