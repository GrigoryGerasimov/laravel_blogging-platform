<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Http\Requests\Profile\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Comment $comment): RedirectResponse
    {
        $comment = $this->service->update($request, $comment);

        return redirect()->route('profile.comment.show', compact('comment'));
    }
}
