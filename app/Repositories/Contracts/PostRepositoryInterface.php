<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function getPaginatedPublishedPosts(int $perPage = 9);
    public function findPublishedBySlug(string $slug);
    public function getRelatedPublishedPosts(int $excludePostId, int $limit = 3);
}
