<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\{Comment, Post};
use Carbon\Carbon;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Post $post): View
    {
        $post->created_at_formatted = Carbon::parse($post->created_at)->format('F d H:i');

        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->take(3)->get();

        $commentsList = $post->comments->map(function ($comment) {
            $comment->created_at_formatted = Carbon::parse($comment->created_at);
            return $comment;
        });

        return view('main.show', compact('post', 'relatedPosts'));
    }
}
