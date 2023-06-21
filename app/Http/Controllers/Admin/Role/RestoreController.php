<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Role $role
     * @return RedirectResponse
     */
    public function __invoke(Role $role): RedirectResponse
    {
        $role->restore();

        return redirect()->route('admin.role.show', compact('role'));
    }
}
