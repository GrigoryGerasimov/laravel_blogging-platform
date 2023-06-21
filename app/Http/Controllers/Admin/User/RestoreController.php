<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RestoreController extends BaseController
{
    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(User $user): RedirectResponse
    {
        $isRestored = $this->service->restore($user);

        return $isRestored ? redirect()->route('admin.user.show', compact('user')) : redirect()->back();
    }
}
