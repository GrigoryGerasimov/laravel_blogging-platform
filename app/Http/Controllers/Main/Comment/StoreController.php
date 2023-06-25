<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Profile\Comment\BaseController;
use App\Http\Requests\Profile\Comment\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request, Post $post): RedirectResponse
    {
        $this->service->store($request);

        return redirect()->route('post.show', $post);
    }
}
