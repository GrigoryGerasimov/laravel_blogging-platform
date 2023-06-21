<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Storage, DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $postTags = $data['tag_ids'];
            unset($data['tag_ids']);

            if (array_key_exists('preview_img', $data)) {
                $data['preview_img'] = Storage::disk('public')->put('images/preview', $data['preview_img']);
            }
            if (array_key_exists('main_img', $data)) {
                $data['main_img'] = Storage::disk('public')->put('images/main', $data['main_img']);
            }

            $post->update($data);
            $post->tags()->sync($postTags);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
        }

        return redirect()->route('admin.post.show', compact('post'));
    }
}
