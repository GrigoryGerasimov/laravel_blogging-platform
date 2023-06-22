<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $rolesList = Role::all();

        return view('admin.users.create', compact('rolesList'));
    }
}
