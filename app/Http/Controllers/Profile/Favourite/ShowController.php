<?php

namespace App\Http\Controllers\Profile\Favourite;

use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * @param Post $favourite
     * @return View
     */
    public function __invoke(Post $favourite): View
    {
        return view('profile.favourites.show', compact('favourite'));
    }
}
