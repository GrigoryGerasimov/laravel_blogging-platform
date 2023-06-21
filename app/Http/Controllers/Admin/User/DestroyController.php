<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(User $user): RedirectResponse
    {
        $isDeleted = $this->service->delete($user);

        return $isDeleted ? redirect()->route('admin.user.index') : redirect()->back();
    }
}
