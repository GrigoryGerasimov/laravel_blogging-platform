<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Tag $tag
     * @return View
     */
    public function __invoke(Tag $tag): View
    {
        return view('admin.tags.edit', compact('tag'));
    }
}
