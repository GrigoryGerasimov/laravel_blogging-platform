<?php

namespace App\Http\Controllers\Profile\Post;

use App\Http\Requests\Profile\Post\StoreRequest;
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

        return redirect()->route('profile.post.index');
    }
}
