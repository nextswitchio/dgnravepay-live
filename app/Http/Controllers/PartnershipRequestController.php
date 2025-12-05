<?php

namespace App\Http\Controllers;

use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

class PartnershipRequestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'proposal' => 'required|string',
        ]);

        PartnershipRequest::create($validated);

        return response()->json([
            'message' => 'Your partnership request has been submitted successfully. We will get back to you shortly.',
        ], 201);
    }
}
