<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request): View
    {
//        [$category, $tagsToShow] = $this->service->show($post);

        $category = $post->category;
        $tagsToShow = $post->tags->pluck('title')->toArray();

        return view('post.show', compact('post', 'category', 'tagsToShow', 'request'));
    }
}
