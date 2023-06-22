<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\{Role, User};
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        $rolesList = Role::all();

        return view('admin.users.edit', compact('user', 'rolesList'));
    }
}
