<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getFeaturedProducts(int $limit = 6);
    public function getAllActiveProducts(int $perPage = 12, ?string $categorySlug = null);
    public function findBySlug(string $slug);
    public function getRelatedProducts(int $categoryId, int $excludeProductId, int $limit = 4);
}
