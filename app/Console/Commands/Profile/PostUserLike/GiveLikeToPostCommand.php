<?php

namespace App\Console\Commands\Profile\PostUserLike;

use App\Models\{Post, User};
use Illuminate\Console\Command;
use Illuminate\Support\Facades\{DB, Log};

class GiveLikeToPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:like {postId} {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Like a post';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            DB::beginTransaction();

            $postId = $this->argument('postId');
            $userId = $this->argument('userId');

            $post = Post::find($postId);
            $user = User::find($userId);

            $user->likedPosts()->attach(1);

            DB::commit();

            $this->info("Post $postId has been liked by user $user->name");
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            $this->error($e->getMessage());
        }
    }
}
