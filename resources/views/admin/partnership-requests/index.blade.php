@extends('admin.layout')
@section('page_title', 'Partnership Requests')
@section('page_subtitle', 'Manage partnership inquiries')

@section('content')
    <div class="bg-white/90 backdrop-blur rounded-xl shadow ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="text-left bg-gray-50 border-b">
                        <th class="p-3 text-sm font-semibold text-gray-600">Company</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Contact Person</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Email</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Date</th>
                        <th class="p-3 text-sm font-semibold text-gray-600">Status</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">
                                <div class="font-medium">{{ $request->company_name }}</div>
                                <div class="text-xs text-gray-500">{{ $request->country }}</div>
                            </td>
                            <td class="p-3 text-sm text-gray-700">
                                {{ $request->first_name }} {{ $request->last_name }}
                            </td>
                            <td class="p-3 text-sm text-gray-700">
                                <a href="mailto:{{ $request->company_email }}" class="hover:underline">{{ $request->company_email }}</a>
                            </td>
                             <td class="p-3 text-sm text-gray-600">
                                {{ $request->created_at->format('M d, Y') }}
                            </td>
                            <td class="p-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $request->status === 'reviewed' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $request->status === 'contacted' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $request->status === 'ignored' ? 'bg-gray-100 text-gray-800' : '' }}
                                ">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td class="p-3 text-right space-x-2">
                                <a href="{{ route('admin.partnership-requests.show', $request) }}"
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-blue-600 text-white hover:bg-blue-500">View</a>
                                
                                <form action="{{ route('admin.partnership-requests.destroy', $request) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this request?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-red-600 text-white hover:bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $requests->links() }}</div>
@endsection
