<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\{Post, Category};
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Post $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $categoriesList = Category::all();

        return view('admin.posts.edit', compact('post', 'categoriesList'));
    }
}
