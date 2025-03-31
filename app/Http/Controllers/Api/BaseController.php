<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\Service;

class BaseController extends Controller
{
    public function __construct(
        protected Service $service
    )
    {
//        $this->middleware('auth');
//        $this->middleware('auth:sanctum');
    }
}
