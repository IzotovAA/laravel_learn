<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $posts = Post::paginate(10);

        return view('post.index', compact('posts'));
    }
}
