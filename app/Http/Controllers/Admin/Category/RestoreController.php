<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function __invoke(Category $category): RedirectResponse
    {
        $category->restore();

        return redirect()->route('admin.category.show', $category);
    }
}
