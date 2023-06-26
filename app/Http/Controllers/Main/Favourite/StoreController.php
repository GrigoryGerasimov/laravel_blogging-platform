<?php

namespace App\Http\Controllers\Main\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class StoreController extends Controller
{
    public function __invoke(Post $post): RedirectResponse
    {
        try {
            DB::beginTransaction();

            auth()->user()->favourites()->toggle($post->id);

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
