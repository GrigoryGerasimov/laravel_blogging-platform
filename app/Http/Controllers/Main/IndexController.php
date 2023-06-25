<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $postsList = Post::paginate(3)->through(function ($post) {
            $post->created_at_formatted = Carbon::parse($post->created_at)->format('F d, H:i');
            return $post;
        });

        $topPostsList = Post::withCount('likedByUsers')->orderBy('liked_by_users_count', 'DESC')->take(5)->get();

        $mostCommentedPostsList = Post::withCount('comments')->orderBy('comments_count', 'DESC')->take(5)->get();

        return view('main.index', compact('postsList', 'topPostsList', 'mostCommentedPostsList'));
    }
}
