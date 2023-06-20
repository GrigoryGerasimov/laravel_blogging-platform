<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());

        return redirect()->route('admin.tag.show', compact('tag'));
    }
}
