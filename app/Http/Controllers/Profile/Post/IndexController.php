<?php

namespace App\Http\Controllers\Profile\Post;

use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $postsList = auth()->user()->posts;

        return view('profile.posts.index', compact('postsList'));
    }
}
