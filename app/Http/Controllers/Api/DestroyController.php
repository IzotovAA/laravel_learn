<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): PostResource
    {
        $post->delete();

        return PostResource::make($post);
    }
}
