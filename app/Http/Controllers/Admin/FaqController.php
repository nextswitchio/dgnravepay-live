<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $query = Faq::query();

        $search = request('q');
        $status = request('status'); // 'published' | 'draft' | null
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
            });
        }
        if ($status === 'published') {
            $query->where('is_published', true);
        } elseif ($status === 'draft') {
            $query->where('is_published', false);
        }

        $faqs = $query->latest('updated_at')->paginate(20)->appends(request()->query());
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_published' => 'sometimes|boolean',
        ]);
        Faq::create($data);
        return redirect()->route('admin.faqs.index')->with('status', 'FAQ created');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_published' => 'sometimes|boolean',
        ]);
        $faq->update($data);
        return redirect()->route('admin.faqs.index')->with('status', 'FAQ updated');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('status', 'FAQ deleted');
    }

    public function togglePublish(Faq $faq)
    {
        $faq->is_published = !$faq->is_published;
        $faq->save();
        return back()->with('status', 'Publish state updated');
    }
}
