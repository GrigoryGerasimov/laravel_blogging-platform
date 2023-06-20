<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categoriesList = Category::all();

        return view('admin.posts.create', compact('categoriesList'));
    }
}
