<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, User $user): RedirectResponse
    {
        $user = $this->service->update($request, $user);

        return redirect()->route('admin.user.show', compact('user'));
    }
}
