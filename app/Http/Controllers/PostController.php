<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postHandler;

    public function __construct(\App\Handlers\PostHandler $postHandler)
    {
        $this->postHandler = $postHandler;
    }

    public function index()
    {
        $posts = $this->postHandler->getPaginatedPosts(9);
        return view('news.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = $this->postHandler->getPostBySlug($slug);
        $relatedPosts = $this->postHandler->getRelatedPosts($post->id, 3);

        return view('news.show', compact('post', 'relatedPosts'));
    }
}
