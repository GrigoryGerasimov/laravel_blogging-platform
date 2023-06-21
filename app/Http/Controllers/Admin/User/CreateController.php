<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('admin.users.create');
    }
}
