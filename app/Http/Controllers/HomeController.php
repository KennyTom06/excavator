<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = \App\Models\Product::where('is_active', true)
                                   ->latest()
                                   ->take(6)
                                   ->get();

        return view('home', compact('featuredProducts'));
    }
}
