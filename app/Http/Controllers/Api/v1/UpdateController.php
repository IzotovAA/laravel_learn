<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Post $post): PostResource
    {
        $postData = $request->validated();

        $updatedPost = $this->service->update($postData, $post);

        return PostResource::make($updatedPost);
    }
}
