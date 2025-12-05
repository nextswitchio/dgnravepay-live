<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

class PartnershipRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = PartnershipRequest::latest()->paginate(10);
        return view('admin.partnership-requests.index', compact('requests'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PartnershipRequest $partnershipRequest)
    {
        return view('admin.partnership-requests.show', compact('partnershipRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartnershipRequest $partnershipRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,contacted,ignored',
        ]);

        $partnershipRequest->update($validated);

        return back()->with('success', 'Partnership request status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartnershipRequest $partnershipRequest)
    {
        $partnershipRequest->delete();

        return redirect()->route('admin.partnership-requests.index')
            ->with('success', 'Partnership request deleted successfully.');
    }
}
