<?php

declare(strict_types=1);

namespace App\Http\Services\Profile\Comment;

use App\Http\Services\Service;
use App\Jobs\Comment\CommentStoreJob;
use App\Jobs\Comment\CommentUpdateJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{DB, Log};

final class CommentService extends Service
{
    public function store(FormRequest $request): void
    {
        $comment = $request->validated();

        dispatch(new CommentStoreJob($comment));
    }

    public function update(FormRequest $request, Model $model): Model
    {
        $updatedComment = $request->validated();

        dispatch(new CommentUpdateJob($model, $updatedComment));

        return $model;
    }

    public function delete(Model $model): ?bool
    {
        try {
            DB::beginTransaction();

            $isDeleted = $model->delete();

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
