<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\User\UserService;

class BaseController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $service;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }
}
