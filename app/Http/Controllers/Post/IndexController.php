<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Pipelines\PostPipeline;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostPipeline $postPipeline, FilterRequest $request): View|RedirectResponse
    {
        $request->session()->put('post_url', $request->fullUrl());
        $data = $request->validated();
        $categories = Category::all();
        $posts = $postPipeline->apply(Post::query())->paginate(10)->withQueryString()->onEachSide(1);

        return $this->service->validateCurrentPage($posts, $request)
            ? view('post.index', compact('posts', 'data', 'categories'))
            : redirect($request->session()->get('post_url'));
    }
}
