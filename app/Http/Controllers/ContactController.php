<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Fetch active states with their active branches, ordered
        $states = State::active()
            ->with(['branches' => function ($query) {
                $query->active()->orderBy('order');
            }])
            ->orderBy('order')
            ->get();

        return view('pages.contact', compact('states'));
    }
}
