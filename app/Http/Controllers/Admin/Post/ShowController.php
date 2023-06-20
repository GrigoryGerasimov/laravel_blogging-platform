<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class ShowController extends Controller
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
