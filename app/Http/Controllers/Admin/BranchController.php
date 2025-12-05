<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\State;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $query = Branch::with('state');
        
        // Filter by state
        if (request('state_id')) {
            $query->where('state_id', request('state_id'));
        }
        
        // Filter by status
        if (request('status') === 'active') {
            $query->where('is_active', true);
        } elseif (request('status') === 'inactive') {
            $query->where('is_active', false);
        }
        
        $branches = $query->orderBy('order')->latest('updated_at')->paginate(20)->appends(request()->query());
        $states = State::orderBy('name')->get();
        
        return view('admin.branches.index', compact('branches', 'states'));
    }

    public function create()
    {
        $states = State::active()->orderBy('name')->get();
        return view('admin.branches.create', compact('states'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $payload = [
            'state_id' => $data['state_id'],
            'name' => $data['name'],
            'address' => $data['address'],
            'email' => $data['email'] ?? null,
            'whatsapp' => $data['whatsapp'] ?? null,
            'phone' => $data['phone'] ?? null,
            'order' => $data['order'] ?? 0,
            'is_active' => $data['is_active'] ?? true,
        ];

        Branch::create($payload);
        return redirect()->route('admin.branches.index')->with('status', 'Branch created successfully');
    }

    public function edit(Branch $branch)
    {
        $states = State::orderBy('name')->get();
        return view('admin.branches.edit', compact('branch', 'states'));
    }

    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $payload = [
            'state_id' => $data['state_id'],
            'name' => $data['name'],
            'address' => $data['address'],
            'email' => $data['email'] ?? null,
            'whatsapp' => $data['whatsapp'] ?? null,
            'phone' => $data['phone'] ?? null,
            'order' => $data['order'] ?? 0,
            'is_active' => $data['is_active'] ?? false,
        ];

        $branch->update($payload);
        return redirect()->route('admin.branches.index')->with('status', 'Branch updated successfully');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('admin.branches.index')->with('status', 'Branch deleted successfully');
    }

    public function toggleActive(Branch $branch)
    {
        $branch->is_active = !$branch->is_active;
        $branch->save();
        return back()->with('status', 'Branch status updated');
    }
}
