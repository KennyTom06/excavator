<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getFeaturedProducts(int $limit = 6)
    {
        return Product::where('is_active', true)
            ->latest()
            ->take($limit)
            ->get();
    }

    public function getAllActiveProducts(int $perPage = 12, ?string $categorySlug = null)
    {
        $query = Product::where('is_active', true);

        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        return $query->latest()->paginate($perPage);
    }

    public function findBySlug(string $slug)
    {
        return Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
    }

    public function getRelatedProducts(int $categoryId, int $excludeProductId, int $limit = 4)
    {
        return Product::where('category_id', $categoryId)
            ->where('id', '!=', $excludeProductId)
            ->where('is_active', true)
            ->take($limit)
            ->get();
    }
}
