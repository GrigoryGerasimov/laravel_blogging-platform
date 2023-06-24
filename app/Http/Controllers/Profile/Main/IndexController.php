<?php

namespace App\Http\Controllers\Profile\Main;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $currentAuthUser = auth()->user();

        $postsCount = $currentAuthUser->posts->count();
        $favouritesCount = $currentAuthUser->favourites->count();

        return view('profile.main.index', compact('postsCount', 'favouritesCount'));
    }
}
