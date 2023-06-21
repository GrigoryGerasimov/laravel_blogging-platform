<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Role $role
     * @return View
     */
    public function __invoke(Role $role): View
    {
        return view('admin.roles.edit', compact('role'));
    }
}
