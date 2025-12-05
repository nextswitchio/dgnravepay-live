@extends('admin.layout')
@section('page_title', 'Request Details')
@section('page_subtitle', 'View partnership request details')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.partnership-requests.index') }}" class="text-sm text-gray-600 hover:text-gray-900">&larr; Back to Requests</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow ring-1 ring-black/5 p-6">
                <h3 class="text-lg font-semibold mb-4">Request Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Contact Name</span>
                        <div class="mt-1 text-sm text-gray-900">{{ $partnershipRequest->first_name }} {{ $partnershipRequest->last_name }}</div>
                    </div>
                    <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Phone</span>
                         <div class="mt-1 text-sm text-gray-900">{{ $partnershipRequest->phone }}</div>
                    </div>
                    <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Company Name</span>
                        <div class="mt-1 text-sm text-gray-900">{{ $partnershipRequest->company_name }}</div>
                    </div>
                     <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Company Email</span>
                        <div class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $partnershipRequest->company_email }}" class="text-primary hover:underline">{{ $partnershipRequest->company_email }}</a>
                        </div>
                    </div>
                    <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Country</span>
                        <div class="mt-1 text-sm text-gray-900">{{ $partnershipRequest->country }}</div>
                    </div>
                     <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Submitted At</span>
                        <div class="mt-1 text-sm text-gray-900">{{ $partnershipRequest->created_at->format('M d, Y H:i A') }}</div>
                    </div>
                </div>

                <div>
                    <span class="block text-xs font-medium text-gray-500 uppercase mb-2">Proposal / Message</span>
                    <div class="bg-gray-50 p-4 rounded-lg text-sm text-gray-800 whitespace-pre-wrap">{{ $partnershipRequest->proposal }}</div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow ring-1 ring-black/5 p-6">
                <h3 class="text-lg font-semibold mb-4">Actions</h3>
                
                <form action="{{ route('admin.partnership-requests.update', $partnershipRequest) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Update Status</label>
                        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <option value="pending" {{ $partnershipRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ $partnershipRequest->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="contacted" {{ $partnershipRequest->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="ignored" {{ $partnershipRequest->status === 'ignored' ? 'selected' : '' }}>Ignored</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="w-full bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90">Update Status</button>
                </form>

                 <form action="{{ route('admin.partnership-requests.destroy', $partnershipRequest) }}" method="POST" class="mt-4 pt-4 border-t" onsubmit="return confirm('Are you sure you want to delete this request?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-white text-red-600 border border-red-600 px-4 py-2 rounded-lg hover:bg-red-50">Delete Request</button>
                </form>
            </div>
        </div>
    </div>
@endsection
