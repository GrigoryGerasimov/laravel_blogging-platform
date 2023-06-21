<?php

declare(strict_types=1);

namespace App\Http\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;

interface ServiceInterface
{
    /**
     * @param FormRequest $request
     * @return void
     */
    public function store(FormRequest $request): void;

    /**
     * @param FormRequest $request
     * @param Model $model
     * @return Model
     */
    public function update(FormRequest $request, Model $model): Model;

    /**
     * @param Model $model
     * @return bool|null
     */
    public function delete(Model $model): ?bool;

    /**
     * @param Model $model
     * @return bool|null
     */
    public function restore(Model $model): ?bool;
}
