<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $isDeleted = $this->service->delete($post);

        return $isDeleted ? redirect()->route('profile.post.index') : redirect()->back();
    }
}
