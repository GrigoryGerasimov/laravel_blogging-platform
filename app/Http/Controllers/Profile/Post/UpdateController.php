<?php

namespace App\Http\Controllers\Profile\Post;

use App\Http\Requests\Profile\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $post = $this->service->update($request, $post);

        return redirect()->route('profile.post.show', compact('post'));
    }
}
