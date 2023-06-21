<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\{Post, Category, Tag};
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * @param Post $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('admin.posts.edit', compact('post', 'categoriesList', 'tagsList'));
    }
}
