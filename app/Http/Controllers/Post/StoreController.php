<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $postData = $request->validated();

        $this->service->store($postData);

        return redirect()->route('post.index');
    }
}
