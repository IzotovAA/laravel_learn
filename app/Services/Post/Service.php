<?php

namespace App\Services\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

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
//        $url = $request->session()->get('post_url');
//        $lastPage = $posts->lastPage();
//        $url = preg_replace("~page=\d+~", 'page=' . $lastPage, $url);
        $url = $posts->url($posts->lastPage());
        $request->session()->put('post_url', $url);
    }

    public function validateCurrentPage(LengthAwarePaginator $posts, FilterRequest $request): bool
    {
        if ($posts->currentPage() > $posts->lastPage()) {
            $this->setCurrentPage($posts, $request);

            return false;
        }

        return true;
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
