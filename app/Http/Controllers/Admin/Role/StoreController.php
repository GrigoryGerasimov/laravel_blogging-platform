<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        Role::firstOrCreate($request->validated());

        return redirect()->route('admin.role.index');
    }
}
