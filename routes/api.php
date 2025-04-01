<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers\Api\v1'], function () {
    Route::get('/v1/posts', IndexController::class)->middleware('auth:sanctum');
    Route::post('/v1/posts', StoreController::class)->middleware('auth:sanctum');
    Route::get('/v1/posts/{post}', ShowController::class)->middleware('auth:sanctum');
    Route::patch('/v1/posts/{post}', UpdateController::class)->middleware('auth:sanctum');
    Route::delete('/v1/posts/{post}', DestroyController::class)->middleware('auth:sanctum');
});

Route::group(['namespace' => 'App\Http\Controllers\Api\v2'], function () {
    Route::get('/v2/posts', IndexController::class)->middleware('auth:sanctum');
    Route::post('/v2/posts', StoreController::class)->middleware('auth:sanctum');
    Route::get('/v2/posts/{post}', ShowController::class)->middleware('auth:sanctum');
    Route::patch('/v2/posts/{post}', UpdateController::class)->middleware('auth:sanctum');
    Route::delete('/v2/posts/{post}', DestroyController::class)->middleware('auth:sanctum');
});
