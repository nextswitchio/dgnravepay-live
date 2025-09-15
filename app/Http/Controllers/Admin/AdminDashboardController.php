<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\CareerPost;
use App\Models\Faq;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $blogCount = BlogPost::count();
        $careerCount = CareerPost::count();
        $faqCount = Faq::count();

        return view('admin.dashboard', compact('blogCount', 'careerCount', 'faqCount'));
    }
}