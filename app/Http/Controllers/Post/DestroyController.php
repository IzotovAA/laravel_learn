<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
