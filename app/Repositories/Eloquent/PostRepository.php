<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getPaginatedPublishedPosts(int $perPage = 9)
    {
        return Post::where('is_published', true)->latest()->paginate($perPage);
    }

    public function findPublishedBySlug(string $slug)
    {
        return Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
    }

    public function getRelatedPublishedPosts(int $excludePostId, int $limit = 3)
    {
        return Post::where('id', '!=', $excludePostId)
            ->where('is_published', true)
            ->latest()
            ->take($limit)
            ->get();
    }
}
