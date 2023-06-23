<?php

namespace App\Http\Controllers\Profile\Post;

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
        return view('profile.posts.show', compact('post'));
    }
}
