<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Http\Controllers\Controller;
use App\Http\Services\Profile\Comment\CommentService;

class BaseController extends Controller
{
    /**
     * @var CommentService
     */
    protected CommentService $service;

    /**
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->service = $commentService;
    }
}
