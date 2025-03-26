<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Pipelines\Filters\CategoryIdFilter;
use App\Pipelines\Filters\ContentFilter;
use App\Pipelines\Filters\TitleFilter;
use App\Pipelines\PostPipeline;
use App\Services\Post\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends BaseController
{
    private PostPipeline $pipeline;

    // рукожопый вариант реализации контроллера, пайплайн класс создаётся напрямую в контроллере
    // по-нормальному надо делать так, что бы пайплайн класс приходил как параметр либо в конструктор, либо напрямую в метод
    // пример нормальной реализации в контроллере Post/indexController.php
    public function __construct(Service $service)
    {
        parent::__construct($service);

        $this->middleware('auth');
        $this->middleware('adminPanel');

        $this->pipeline = new PostPipeline([
            TitleFilter::class,
            ContentFilter::class,
            CategoryIdFilter::class,
        ]);
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(FilterRequest $request): View|RedirectResponse
    {
        $request->session()->put('post_url', $request->fullUrl());
        $data = $request->validated();
        $categories = Category::all();
        $posts = $this->pipeline->apply(Post::query())->paginate(10);

        if ($posts->currentPage() > $posts->lastPage()) {
            $this->service->setCurrentPage($posts, $request);
            return redirect($request->session()->get('post_url'));
        }

        return view('admin.post.index', compact('posts', 'data', 'categories'));
    }
}
