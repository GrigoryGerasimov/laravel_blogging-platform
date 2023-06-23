<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param array $postData
     */
    public function __construct
    (
        protected array $postData
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

            $postTags = $this->postData['tag_ids'];
            unset($this->postData['tag_ids']);

            $newPost = Post::firstOrCreate($this->postData);
            $newPost->tags()->attach($postTags);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
