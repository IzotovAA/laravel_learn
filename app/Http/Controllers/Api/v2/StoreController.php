<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Requests\Api\v2\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request): PostResource|string
    {
        $postData = $request->validated();

        $post = $this->service->store($postData);

        return $post instanceof Post ? PostResource::make($post) : $post;
    }
}
