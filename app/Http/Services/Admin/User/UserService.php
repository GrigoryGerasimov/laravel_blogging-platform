<?php

declare(strict_types=1);

namespace App\Http\Services\Admin\User;

use App\Http\Services\Service;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB, Hash, Log};

final class UserService extends Service
{
    public function store(FormRequest $request): void
    {
        try {
            DB::beginTransaction();

            $userData = $request->validated();

            $userData['password'] = Hash::make($userData['password']);

            User::firstOrCreate(['email' => $userData['email']], $userData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }

    public function update(FormRequest $request, Model $model): Model
    {
        try {
            DB::beginTransaction();

            $updatedUserData = $request->validated();

            $updatedUserData['password'] = Hash::make($updatedUserData['password']);

            $model->update($request->validated());

            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
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
