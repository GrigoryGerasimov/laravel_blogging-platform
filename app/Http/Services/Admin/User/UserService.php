<?php

declare(strict_types=1);

namespace App\Http\Services\Admin\User;

use App\Http\Services\Service;
use App\Mail\SendRegisteredUserCredentialsMail;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB, Hash, Log, Mail};
use Illuminate\Support\Str;

final class UserService extends Service
{
    public function store(FormRequest $request): void
    {
        try {
            DB::beginTransaction();

            $userData = $request->validated();

            $userRoles = $userData['role_ids'];
            unset($userData['role_ids']);

            $password = Str::random(18);
            $userData['password'] = Hash::make($password);

            $user = User::firstOrCreate(['email' => $userData['email']], $userData);
            $user->roles()->attach($userRoles);

            Mail::to($user->email)->send(new SendRegisteredUserCredentialsMail($user->name, $user->email, $password));

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

            $userRoles = $updatedUserData['role_ids'];
            unset($updatedUserData['role_ids']);

            $updatedUserData['password'] = Hash::make($updatedUserData['password']);

            $model->update($request->validated());
            $model->roles()->sync($userRoles);

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
