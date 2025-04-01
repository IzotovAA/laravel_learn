<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Requests\Api\v2\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Post $post): PostResource|string
    {
        $postData = $request->validated();

        $updatedPost = $this->service->update($postData, $post);

        return $updatedPost instanceof Post ? PostResource::make($updatedPost) : $updatedPost;
    }
}
