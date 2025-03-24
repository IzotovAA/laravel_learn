<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
//    public function __invoke(): View
//    {
//        $posts = Post::paginate(10);
//
//        return view('post.index', compact('posts'));
//    }

    public function __invoke(FilterRequest $request): View|RedirectResponse
    {
        $request->session()->put('post_url', $request->fullUrl());
        $data = $request->validated();
        $categories = Category::all();
        $filter = app()->make(PostFilter::class, ['queryParams' => $data]);
        $posts = Post::filter($filter)->paginate(10);

        if ($posts->currentPage() > $posts->lastPage()) {
            $this->service->setCurrentPage($posts, $request);
            return redirect($request->session()->get('post_url'));
        }

        return view('post.index', compact('posts', 'data', 'categories'));
    }
}
