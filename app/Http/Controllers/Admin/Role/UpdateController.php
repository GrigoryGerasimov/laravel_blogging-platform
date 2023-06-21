<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Role $role): RedirectResponse
    {
        $role->update($request->validated());

        return redirect()->route('admin.role.show', compact('role'));
    }
}
