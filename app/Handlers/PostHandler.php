<?php

namespace App\Handlers;

use App\Repositories\Contracts\PostRepositoryInterface;

class PostHandler
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPaginatedPosts(int $perPage = 9)
    {
        return $this->postRepository->getPaginatedPublishedPosts($perPage);
    }

    public function getPostBySlug(string $slug)
    {
        return $this->postRepository->findPublishedBySlug($slug);
    }

    public function getRelatedPosts(int $excludePostId, int $limit = 3)
    {
        return $this->postRepository->getRelatedPublishedPosts($excludePostId, $limit);
    }
}
