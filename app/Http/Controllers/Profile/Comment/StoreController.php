<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Http\Requests\Profile\Comment\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $this->service->store($request);

        return redirect()->route('profile.comment.index');
    }
}
