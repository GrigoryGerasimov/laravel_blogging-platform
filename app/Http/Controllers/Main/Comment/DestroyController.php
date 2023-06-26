<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        return redirect()->back();
    }
}
