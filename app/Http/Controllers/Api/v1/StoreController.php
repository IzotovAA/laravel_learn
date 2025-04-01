<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\StoreRequest;
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
