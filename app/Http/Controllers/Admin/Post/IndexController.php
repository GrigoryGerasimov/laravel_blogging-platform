<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $postsList = Post::all();

        return view('admin.posts.index', compact('postsList'));
    }
}
