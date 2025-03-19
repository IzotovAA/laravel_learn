<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $postData = $request->validated();

        $this->service->update($postData, $post);

        return redirect()->route('post.show', $post->id);
    }
}
