<?php

namespace App\Http\Controllers\Profile\Favourite;

use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $favouritesList = auth()->user()->favourites;

        return view('profile.favourites.index', compact('favouritesList'));
    }
}
