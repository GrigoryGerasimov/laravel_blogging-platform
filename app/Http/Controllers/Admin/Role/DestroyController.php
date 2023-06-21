<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    /**
     * @param Role $role
     * @return RedirectResponse
     */
    public function __invoke(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('admin.role.index');
    }
}
