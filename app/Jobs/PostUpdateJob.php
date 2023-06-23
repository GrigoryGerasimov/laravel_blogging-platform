<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param Model $postModel
     * @param array $postData
     */
    public function __construct
    (
        protected Model $postModel,
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

            $this->postModel->update($this->postData);
            $this->postModel->tags()->sync($postTags);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(500);
        }
    }
}
