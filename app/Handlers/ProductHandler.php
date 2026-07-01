<?php

namespace App\Handlers;

use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductHandler
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getFeaturedProducts(int $limit = 6)
    {
        return $this->productRepository->getFeaturedProducts($limit);
    }

    public function getPaginatedProducts(int $perPage = 12, ?string $categorySlug = null)
    {
        return $this->productRepository->getAllActiveProducts($perPage, $categorySlug);
    }

    public function getProductBySlug(string $slug)
    {
        return $this->productRepository->findBySlug($slug);
    }

    public function getRelatedProducts(int $categoryId, int $excludeProductId, int $limit = 4)
    {
        return $this->productRepository->getRelatedProducts($categoryId, $excludeProductId, $limit);
    }
}
