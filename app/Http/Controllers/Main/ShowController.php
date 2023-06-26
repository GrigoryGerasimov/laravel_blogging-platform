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
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->take(3)->get();

        return view('main.show', compact('post', 'relatedPosts'));
    }
}
