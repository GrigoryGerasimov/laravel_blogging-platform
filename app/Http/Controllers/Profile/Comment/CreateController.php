<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Models\Post;
use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $postsList = Post::all();

        return view('profile.comments.create', compact('postsList'));
    }
}
