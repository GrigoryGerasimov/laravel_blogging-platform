<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $post = $request->validated();
        $post['img'] = Storage::put('img', $post['img']);
        $post['file'] = Storage::put('file', $post['file']);

        Post::firstOrCreate($post);

        return redirect()->route('admin.post.index');
    }
}
