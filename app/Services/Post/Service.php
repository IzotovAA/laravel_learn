<?php

namespace App\Services\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class Service
{
    // метод нужно называть по действию который он выполняет
    // правильный сервис
    public function store(mixed $postData): void
    {
        $tagsId = $postData['tags_id'];
        unset($postData['tags_id']);

        $post = Post::create($postData);
        $post->tags()->attach($tagsId);
    }

    // правильный сервис
    public function update(mixed $postData, Post $post): void
    {
        $tagsId = $postData['tags_id'];
        unset($postData['tags_id']);

        $post->update($postData);
        $post->tags()->sync($tagsId);
    }

    public function setCurrentPage(LengthAwarePaginator $posts, FilterRequest $request): void
    {
        $url = $request->session()->get('post_url');
        $lastPage = $posts->lastPage();
        $url = preg_replace("~page=\d+~", 'page=' . $lastPage, $url);
        $request->session()->put('post_url', $url);
    }

    // ненужный сервис, не правильное название
//    public function edit(Post $post): array
//    {
//        $categories = Category::all();
//        $tags = Tag::all();
//        $tagsIdToSelect = $post->tags->pluck('id')->toArray();
//
//        return [$categories, $tags, $tagsIdToSelect];
//    }

    // ненужный сервис, не правильное название
//    public function show(Post $post): array
//    {
//        $category = $post->category;
//        $tagsToShow = $post->tags->pluck('title')->toArray();
//
//        return [$category, $tagsToShow];
//    }
}
