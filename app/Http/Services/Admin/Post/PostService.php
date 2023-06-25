<?php

declare(strict_types=1);

namespace App\Http\Services\Admin\Post;

use App\Http\Services\Service;
use App\Jobs\Post\PostStoreJob;
use App\Jobs\Post\PostUpdateJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{DB, Log, Storage};

final class PostService extends Service
{
    public function store(FormRequest $request): void
    {
        $post = $request->validated();

        $post['preview_img'] = Storage::disk('public')->put('images/preview', $post['preview_img']);
        $post['main_img'] = Storage::disk('public')->put('images/main', $post['main_img']);
        $post['suppl_prim_img'] = Storage::disk('public')->put('images/supplementary/primary', $post['suppl_prim_img']);
        $post['suppl_sec_img'] = Storage::disk('public')->put('images/supplementary/secondary', $post['suppl_sec_img']);

        dispatch(new PostStoreJob($post));
    }

    public function update(FormRequest $request, Model $model): Model
    {
        $data = $request->validated();

        if (array_key_exists('preview_img', $data)) {
            $data['preview_img'] = Storage::disk('public')->put('images/preview', $data['preview_img']);
        }
        if (array_key_exists('main_img', $data)) {
            $data['main_img'] = Storage::disk('public')->put('images/main', $data['main_img']);
        }
        if (array_key_exists('suppl_prim_img', $data)) {
            $data['suppl_prim_img'] = Storage::disk('public')->put('images/supplementary/primary', $data['suppl_prim_img']);
        }
        if (array_key_exists('suppl_sec_img', $data)) {
            $data['suppl_sec_img'] = Storage::disk('public')->put('images/supplementary/secondary', $data['suppl_sec_img']);
        }

        dispatch(new PostUpdateJob($model, $data));

        return $model;
    }

    public function delete(Model $model): ?bool
    {
        try {
            DB::beginTransaction();

            $isDeleted = $model->delete();

            if (isset($model->preview_img) && Storage::disk('public')->exists($model->preview_img)) {
                Storage::disk('public')->delete($model->preview_img);
            }
            if (isset($model->main_img) && Storage::disk('public')->exists($model->main_img)) {
                Storage::disk('public')->delete($model->main_img);
            }
            if (isset($model->suppl_prim_img) && Storage::disk('public')->exists($model->suppl_prim_img)) {
                Storage::disk('public')->delete($model->suppl_prim_img);
            }
            if (isset($model->suppl_sec_img) && Storage::disk('public')->exists($model->suppl_sec_img)) {
                Storage::disk('public')->delete($model->suppl_sec_img);
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
