<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }
}
