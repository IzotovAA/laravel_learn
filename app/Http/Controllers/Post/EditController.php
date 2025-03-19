<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): View
    {
        [$categories, $tags, $tagsIdToSelect] = $this->service->edit($post);

        return view('post.edit', compact('post', 'categories', 'tags', 'tagsIdToSelect'));
    }
}
