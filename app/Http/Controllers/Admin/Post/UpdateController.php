<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()->route('admin.post.show', compact('post'));
    }
}
