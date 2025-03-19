<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class Service
{
    public function store(mixed $postData): void
    {
        $tagsId = $postData['tags_id'];
        unset($postData['tags_id']);

        $post = Post::create($postData);
        $post->tags()->attach($tagsId);
    }

    public function update(mixed $postData, Post $post): void
    {
        $tagsId = $postData['tags_id'];
        unset($postData['tags_id']);

        $post->update($postData);
        $post->tags()->sync($tagsId);
    }

    public function edit(Post $post): array
    {
        $categories = Category::all();
        $tags = Tag::all();
        $tagsIdToSelect = $post->tags->pluck('id')->toArray();

        return [$categories, $tags, $tagsIdToSelect];
    }

    public function show(Post $post): array
    {
        $category = $post->category;
        $tagsToShow = $post->tags->pluck('title')->toArray();

        return [$category, $tagsToShow];
    }
}
