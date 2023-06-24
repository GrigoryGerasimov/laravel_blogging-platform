<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function __invoke(Comment $comment): RedirectResponse
    {
        $isDeleted = $this->service->delete($comment);

        return $isDeleted ? redirect()->route('profile.comment.index') : redirect()->back();
    }
}
