<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $query = State::withCount('branches');
        
        // Filter by status
        if (request('status') === 'active') {
            $query->where('is_active', true);
        } elseif (request('status') === 'inactive') {
            $query->where('is_active', false);
        }
        
        $states = $query->orderBy('order')->latest('updated_at')->paginate(20)->appends(request()->query());
        return view('admin.states.index', compact('states'));
    }

    public function create()
    {
        return view('admin.states.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:states,name',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $payload = [
            'name' => $data['name'],
            'order' => $data['order'] ?? 0,
            'is_active' => $data['is_active'] ?? true,
        ];

        State::create($payload);
        return redirect()->route('admin.states.index')->with('status', 'State created successfully');
    }

    public function edit(State $state)
    {
        $state->loadCount('branches');
        return view('admin.states.edit', ['state' => $state]);
    }

    public function update(Request $request, State $state)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:states,name,' . $state->id,
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $payload = [
            'name' => $data['name'],
            'order' => $data['order'] ?? 0,
            'is_active' => $data['is_active'] ?? false,
        ];

        $state->update($payload);
        return redirect()->route('admin.states.index')->with('status', 'State updated successfully');
    }

    public function destroy(State $state)
    {
        // Check if state has branches
        if ($state->branches()->count() > 0) {
            return back()->with('error', 'Cannot delete state with existing branches. Please delete all branches first.');
        }
        
        $state->delete();
        return redirect()->route('admin.states.index')->with('status', 'State deleted successfully');
    }

    public function toggleActive(State $state)
    {
        $state->is_active = !$state->is_active;
        $state->save();
        return back()->with('status', 'State status updated');
    }
}
