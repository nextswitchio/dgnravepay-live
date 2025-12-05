<?php

namespace App\Http\Controllers;

use App\Models\PressItem;
use Illuminate\Http\Request;

class PressController extends Controller
{
    public function index()
    {
        // Fetch published items grouped by category
        $newsItems = PressItem::where('category', 'news')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();
            
        $logoItems = PressItem::where('category', 'logo')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();
            
        $teamItems = PressItem::where('category', 'team')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();
            
        $productItems = PressItem::where('category', 'product')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();
            
        $featuredItems = PressItem::where('category', 'featured')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        return view('pages.press', compact(
            'newsItems',
            'logoItems',
            'teamItems',
            'productItems',
            'featuredItems'
        ));
    }
}
