<?php

declare(strict_types=1);

namespace App\Http\Services\Admin\User;

use App\Http\Services\Service;
use App\Jobs\UserStoreJob;
use App\Jobs\UserUpdateJob;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB, Log};

final class UserService extends Service
{
    public function store(FormRequest $request): void
    {
        $userData = $request->validated();

        dispatch(new UserStoreJob($userData));
    }

    public function update(FormRequest $request, Model $model): Model
    {
        $updatedUserData = $request->validated();

        dispatch(new UserUpdateJob($model, $updatedUserData));

        return $model;
    }

    public function delete(Model $model): ?bool
    {
        try {
            DB::beginTransaction();

            $isDeleted = $model->delete();

            DB::commit();

            return $isDeleted;
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
