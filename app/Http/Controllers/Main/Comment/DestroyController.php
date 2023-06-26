<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use App\Models\{Comment, Post};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class DestroyController extends Controller
{
    public function __invoke(Post $post, Comment $comment): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $comment->delete();

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
