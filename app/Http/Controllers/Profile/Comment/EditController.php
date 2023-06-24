<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Models\{Comment, Post};
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * @param Comment $comment
     * @return View
     */
    public function __invoke(Comment $comment): View
    {
        $postsList = Post::all();

        return view('profile.comments.edit', compact('comment', 'postsList'));
    }
}
