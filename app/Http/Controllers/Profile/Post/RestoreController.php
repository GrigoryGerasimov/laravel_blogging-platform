<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class RestoreController extends BaseController
{
    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $isRestored = $post->restore();

        return $isRestored ? redirect()->route('profile.post.show', $post) : redirect()->back();
    }
}
