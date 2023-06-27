<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\{Category, Post};
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Category $category): View
    {
        $relatedPostsList = Post::all()->filter(fn($post) => $post->category_id === $category->id);

        return view('main.categories.show', compact('category', 'relatedPostsList'));
    }
}
