<?php

namespace App\Http\Controllers;

use App\Models\CareerPost;

class CareerController extends Controller
{
    public function index()
    {
        $posts = CareerPost::where('is_published', true)->latest('published_at')->paginate(12);
        return view('pages.career', compact('posts'));
    }

    public function show($slug)
    {
        $post = CareerPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.career-detail', compact('post'));
    }
}
