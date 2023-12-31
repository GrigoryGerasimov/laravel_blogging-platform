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
        $paginatedPostsList = Post::with('likedByUsers')->paginate(3);

        $randomPostsList = Post::with('likedByUsers')->get()->random(6);

        $topPostsList = Post::with('likedByUsers')->orderBy('liked_by_users_count', 'DESC')->take(5)->get();

        $mostCommentedPostsList = Post::orderBy('comments_count', 'DESC')->take(5)->get();

        return view('main.index', compact('paginatedPostsList', 'randomPostsList', 'topPostsList', 'mostCommentedPostsList'));
    }
}
