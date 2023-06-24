<?php

namespace App\Http\Controllers\Profile\Favourite;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * @param Post $favourite
     * @return View
     */
    public function __invoke(Post $favourite): View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('profile.favourites.edit', compact('favourite', 'categoriesList', 'tagsList'));
    }
}
