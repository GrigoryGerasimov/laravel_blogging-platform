<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\{Category, Tag};
use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('profile.posts.create', compact('categoriesList', 'tagsList'));
    }
}
