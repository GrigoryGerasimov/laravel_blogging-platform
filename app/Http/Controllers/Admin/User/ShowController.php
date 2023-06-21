<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }
}
