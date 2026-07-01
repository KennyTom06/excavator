<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productHandler;

    public function __construct(\App\Handlers\ProductHandler $productHandler)
    {
        $this->productHandler = $productHandler;
    }

    public function index()
    {
        $featuredProducts = $this->productHandler->getFeaturedProducts(6);

        return view('home', compact('featuredProducts'));
    }
}
