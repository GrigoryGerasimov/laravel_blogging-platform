<?php

namespace App\Http\Controllers\Profile\Favourite;

use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $favouritesList = auth()->user()->likedPosts;

        return view('profile.favourites.index', compact('favouritesList'));
    }
}
