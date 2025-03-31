<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StoreRequest;
use App\Http\Resources\Post\PostResource;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request): PostResource
    {
        $postData = $request->validated();

        $post = $this->service->store($postData);

        return PostResource::make($post);
    }
}
