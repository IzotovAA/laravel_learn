<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Pipelines\PostPipeline;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostPipeline $postPipeline, FilterRequest $request): AnonymousResourceCollection
    {
        $columns =
            [
                'id',
                'title',
                'content',
                'category_id',
                'image',
                'likes'
            ];

        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
        $posts = $postPipeline->apply(Post::query())->paginate($perPage, $columns, 'page', $page);

        return PostResource::collection($posts);
    }
}
