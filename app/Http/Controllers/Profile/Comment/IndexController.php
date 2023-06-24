<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Models\Comment;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $commentsList = Comment::all();

        return view('profile.comments.index', compact('commentsList'));
    }
}
