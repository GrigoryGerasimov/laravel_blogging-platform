<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Storage, DB, Log};

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $post = $request->validated();

            $postTags = $post['tag_ids'];
            unset($post['tag_ids']);

            $post['preview_img'] = Storage::disk('public')->put('images/preview', $post['preview_img']);
            $post['main_img'] = Storage::disk('public')->put('images/main', $post['main_img']);

            $newPost = Post::firstOrCreate($post);
            $newPost->tags()->attach($postTags);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
        }

        return redirect()->route('admin.post.index');
    }
}
