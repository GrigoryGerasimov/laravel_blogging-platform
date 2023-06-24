<?php

namespace App\Http\Controllers\Profile\Favourite;

use App\Http\Controllers\Controller;
use App\Http\Services\Profile\Post\PostService;

class BaseController extends Controller
{
    protected PostService $service;

    public function __construct(PostService $postService)
    {
        $this->service = $postService;
    }
}
