<?php

namespace App\Http\Controllers\Profile\Favourite;

use App\Http\Requests\Profile\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Post $favourite
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $favourite): RedirectResponse
    {
        $favourite = $this->service->update($request, $favourite);

        return redirect()->route('profile.favourite.show', compact('favourite'));
    }
}
