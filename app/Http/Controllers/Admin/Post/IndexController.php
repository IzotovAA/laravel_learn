<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FilterRequest $request): View|RedirectResponse
    {
//        $posts = Post::paginate(10);
//
//        return view('admin.post.index', compact('posts'));


        $request->session()->put('post_url', $request->fullUrl());
        $data = $request->validated();
        $categories = Category::all();
        $filter = app()->make(PostFilter::class, ['queryParams' => $data]);
        $posts = Post::filter($filter)->paginate(10);

        if ($posts->currentPage() > $posts->lastPage()) {
            $this->service->setCurrentPage($posts, $request);
            return redirect($request->session()->get('post_url'));
        }

        return view('admin.post.index', compact('posts', 'data', 'categories'));
    }
}
