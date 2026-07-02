<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = \App\Models\Product::where('is_active', true)
                                   ->latest()
                                   ->take(6)
                                   ->get();

        $categories = Category::all();

        $industryPosts = \App\Models\Post::where('is_published', true)
                                ->latest()
                                ->take(4)
                                ->get();

        $featuredPost = \App\Models\Post::where('is_published', true)
                                ->latest()
                                ->first();

        $latestPosts = \App\Models\Post::where('is_published', true)
                                ->latest()
                                ->skip(1)
                                ->take(3)
                                ->get();

        return view('home', compact('featuredProducts', 'categories', 'industryPosts', 'featuredPost', 'latestPosts'));
    }
}
