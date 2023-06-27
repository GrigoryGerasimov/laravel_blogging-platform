<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $categoriesList = Category::paginate(3);

        return view('main.categories.index', compact('categoriesList'));
    }
}
