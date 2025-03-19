<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): View
    {
        [$category, $tagsToShow] = $this->service->show($post);

        return view('post.show', compact('post', 'category', 'tagsToShow'));
    }
}
