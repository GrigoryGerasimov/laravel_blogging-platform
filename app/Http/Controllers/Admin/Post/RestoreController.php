<?php

namespace App\Http\Controllers\Admin\Post;

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

        return $isRestored ? redirect()->route('admin.post.show', $post) : redirect()->back();
    }
}
