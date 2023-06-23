<?php

namespace App\Http\Controllers\Profile\Main;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $postsCount = auth()->user()->posts->count();

        return view('profile.main.index', compact('postsCount'));
    }
}