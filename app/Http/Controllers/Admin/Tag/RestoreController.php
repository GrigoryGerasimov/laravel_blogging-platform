<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Tag $tag): RedirectResponse
    {
        $tag->restore();

        return redirect()->route('admin.tag.show', $tag);
    }
}
