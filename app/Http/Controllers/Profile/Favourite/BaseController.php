<?php

namespace App\Http\Controllers\Profile\Favourite;

use App\Http\Controllers\Controller;
use App\Http\Services\Profile\Post\PostService;

class BaseController extends Controller
{
    /**
     * @var PostService
     */
    protected PostService $service;

    /**
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->service = $postService;
    }
}
