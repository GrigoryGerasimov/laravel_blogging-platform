<?php

namespace App\Http\Controllers\Profile\Favourite;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * @param Post $favourite
     * @return RedirectResponse
     */
    public function __invoke(Post $favourite): RedirectResponse
    {
        auth()->user()->favourites()->detach($favourite->id);

        return redirect()->route('profile.favourite.index');
    }
}
