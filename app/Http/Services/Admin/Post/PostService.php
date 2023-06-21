<?php

declare(strict_types=1);

namespace App\Http\Services\Admin\Post;

use App\Http\Services\Service;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB, Log, Storage};

final class PostService extends Service
{
    public function store(FormRequest $request): void
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
            abort(505);
        }
    }

    public function update(FormRequest $request, Model $model): Model
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

            $model->update($data);
            $model->tags()->sync($postTags);

            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(500);
        }
    }

    public function delete(Model $model): ?bool
    {
        try {
            DB::beginTransaction();

            $isDeleted = $model->delete();

            if (Storage::disk('public')->exists($model->preview_img)) {
                Storage::disk('public')->delete($model->preview_img);
            }
            if (Storage::disk('public')->exists($model->main_img)) {
                Storage::disk('public')->delete($model->main_img);
            }

            DB::commit();

            return $isDeleted;
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }

    public function restore(Model $model): ?bool
    {
        try {
            DB::beginTransaction();

            $isRestored = $model->restore();

            DB::commit();

            return $isRestored;
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
