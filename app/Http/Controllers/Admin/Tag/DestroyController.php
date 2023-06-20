<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    /**
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin.tag.index');
    }
}
