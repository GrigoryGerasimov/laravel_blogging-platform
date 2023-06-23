<?php

namespace App\Http\Controllers\Profile\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $postsList = auth()->user()->posts;

        return view('profile.posts.index', compact('postsList'));
    }
}
