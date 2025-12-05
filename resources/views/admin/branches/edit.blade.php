@extends('admin.layout')
@section('page_title', 'Edit Branch')
@section('page_subtitle', '{{ $branch->state->name }}')
@section('page_actions')
    <a href="{{ route('admin.branches.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-lg ring-1 ring-gray-200 hover:bg-gray-200">Back</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('admin.branches.update', $branch) }}" class="space-y-4 bg-white/90 backdrop-blur p-5 md:p-6 rounded-xl shadow ring-1 ring-black/5">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium mb-1" for="state_id">State</label>
            <select id="state_id" name="state_id" class="w-full border rounded-lg p-2" required>
                <option value="">Select a state</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ old('state_id', $branch->state_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
            @error('state_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="name">Branch Name</label>
            <input id="name" name="name" value="{{ old('name', $branch->name) }}" class="w-full border rounded-lg p-2" required />
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="address">Address</label>
            <textarea id="address" name="address" class="w-full border rounded-lg p-2 h-20" required>{{ old('address', $branch->address) }}</textarea>
            @error('address')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="email">Email (Optional)</label>
            <input type="email" id="email" name="email" value="{{ old('email', $branch->email) }}" class="w-full border rounded-lg p-2" />
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="whatsapp">WhatsApp (Optional)</label>
            <input id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $branch->whatsapp) }}" placeholder="+234 9160006956" class="w-full border rounded-lg p-2" />
            @error('whatsapp')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="phone">Phone (Optional)</label>
            <input id="phone" name="phone" value="{{ old('phone', $branch->phone) }}" placeholder="+234 2013306189" class="w-full border rounded-lg p-2" />
            @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block font-medium mb-1" for="order">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', $branch->order) }}" class="w-full border rounded-lg p-2" />
            <p class="text-sm text-gray-500 mt-1">Lower numbers appear first</p>
            @error('order')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $branch->is_active) ? 'checked' : '' }} />
            <label for="is_active" class="font-medium">Active</label>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Branch</button>
            <a href="{{ route('admin.branches.index') }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200">Cancel</a>
        </div>
    </form>
@endsection
