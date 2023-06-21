<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $usersList = User::all();

        return view('admin.users.index', compact('usersList'));
    }
}
