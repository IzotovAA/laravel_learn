<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class FilterController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FilterRequest $request): View
    {
        $data = $request->validated();
        $categories = Category::all();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);

        return view('post.filter', compact('posts', 'data', 'categories'));
    }
}
