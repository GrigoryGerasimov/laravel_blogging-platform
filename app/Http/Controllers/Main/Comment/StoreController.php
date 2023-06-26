<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Comment\StoreRequest;
use App\Mail\SendNewCommentMailWithQueue;
use App\Models\{Comment, Post};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log, Mail};

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request, Post $post): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $newComment = Comment::firstOrCreate($request->validated());

            $relatedPost = $newComment->post;

            Mail::to($relatedPost->user->email)->send((new SendNewCommentMailWithQueue($relatedPost->user->name, $newComment))->afterCommit());

            DB::commit();

            return redirect()->route('post.show', $post);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }

    }
}
