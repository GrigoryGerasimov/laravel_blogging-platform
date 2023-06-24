<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class RestoreController extends BaseController
{
    /**
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function __invoke(Comment $comment): RedirectResponse
    {
        $isRestored = $comment->restore();

        return $isRestored ? redirect()->route('profile.comment.show', $comment) : redirect()->back();
    }
}
