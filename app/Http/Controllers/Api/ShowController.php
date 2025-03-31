<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request): PostResource
    {
        return PostResource::make($post);
    }
}
