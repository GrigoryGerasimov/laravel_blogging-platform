<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Models\Comment;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * @param Comment $comment
     * @return View
     */
    public function __invoke(Comment $comment): View
    {
        return view('profile.comments.show', compact('comment'));
    }
}
