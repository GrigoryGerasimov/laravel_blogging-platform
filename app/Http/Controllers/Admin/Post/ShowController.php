<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * @param Post $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        return view('admin.posts.show', compact('post'));
    }
}
