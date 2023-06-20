<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * @param Category $category
     * @return View
     */
    public function __invoke(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }
}
