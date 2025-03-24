<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): View
    {
//        [$categories, $tags, $tagsIdToSelect] = $this->service->edit($post);

        $categories = Category::all();
        $tags = Tag::all();
        $tagsIdToSelect = $post->tags->pluck('id')->toArray();

        return view('post.edit', compact('post', 'categories', 'tags', 'tagsIdToSelect'));
    }
}
