<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\Api\v1\Service;


class BaseController extends Controller
{
    public function __construct(
        protected Service $service
    )
    {
        $this->middleware('auth');
//        $this->middleware('auth:sanctum');
    }
}
