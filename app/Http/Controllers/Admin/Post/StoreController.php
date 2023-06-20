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

        $post['preview_img'] = Storage::put('images/preview', $post['preview_img']);
        $post['main_img'] = Storage::put('images/main', $post['main_img']);

        Post::firstOrCreate($post);

        return redirect()->route('admin.post.index');
    }
}
