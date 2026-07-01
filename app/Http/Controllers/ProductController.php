<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productHandler;

    public function __construct(\App\Handlers\ProductHandler $productHandler)
    {
        $this->productHandler = $productHandler;
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $categorySlug = $request->input('category');
        $products = $this->productHandler->getPaginatedProducts(12, $categorySlug);
        $categories = \App\Models\Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = $this->productHandler->getProductBySlug($slug);
        $relatedProducts = $this->productHandler->getRelatedProducts($product->category_id, $product->id, 4);

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
