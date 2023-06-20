<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('admin.category.show', compact('category'));
    }
}
