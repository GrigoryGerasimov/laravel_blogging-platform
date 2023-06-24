<?php

namespace App\Jobs\Comment;

use App\Mail\SendNewCommentMailWithQueue;
use App\Models\{Comment, Post};
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\{DB, Log, Mail};

class CommentStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param array $commentData
     */
    public function __construct
    (
        protected array $commentData
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            DB::beginTransaction();

            $newComment = Comment::firstOrCreate($this->commentData);

            $relatedPost = $newComment->post;

            Mail::to($relatedPost->user->email)->send((new SendNewCommentMailWithQueue($relatedPost->user->name, $newComment))->afterCommit());

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
