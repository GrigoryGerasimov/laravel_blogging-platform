<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\{Category, Post, Role, Tag, User};
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categoriesCount = Category::all()->count();
        $postsCount = Post::all()->count();
        $rolesCount = Role::all()->count();
        $tagsCount = Tag::all()->count();
        $usersCount = User::all()->count();

        return view('admin.main.index', compact('categoriesCount', 'postsCount', 'rolesCount', 'tagsCount', 'usersCount'));
    }
}
