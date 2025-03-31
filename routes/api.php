<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::get('/posts', IndexController::class)->middleware('auth:sanctum');
    Route::post('/posts', StoreController::class)->middleware('auth:sanctum');
    Route::get('/posts/{post}', ShowController::class)->middleware('auth:sanctum');
    Route::patch('/posts/{post}', UpdateController::class)->middleware('auth:sanctum');
    Route::delete('/posts/{post}', DestroyController::class)->middleware('auth:sanctum');
});
