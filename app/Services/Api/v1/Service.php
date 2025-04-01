<?php

namespace App\Services\Api\v1;

use App\Models\Post;

class Service
{
    public function store(mixed $postData): Post
    {
        $tagsId = $postData['tags_id'];
        unset($postData['tags_id']);

        $post = Post::create($postData);
        $post->tags()->attach($tagsId);

        return $post;
    }

    public function update(mixed $postData, Post $post): Post
    {
        if (isset($postData['tags_id'])) {
            $tagsId = $postData['tags_id'];
            unset($postData['tags_id']);
            $post->update($postData);
            $post->tags()->sync($tagsId);
        } else {
            $post->update($postData);
        }

        return $post->refresh();
    }
}
