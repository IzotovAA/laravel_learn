<?php

namespace App\Services\Api\v2;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store(mixed $postData): Post|string
    {
        try {
            DB::beginTransaction();

            $category = $postData['category'];
            $tags = $postData['tags'];

            $postData = $this->categoryHelper($postData, $category);
            $tagsId = $this->tagsHelper($tags);

            unset($postData['category']);
            unset($postData['tags']);

            $post = Post::create($postData);
            $post->tags()->attach($tagsId);

            DB::commit();
        } catch (\Exception|\Throwable $e) {
            Db::rollBack();

            return $e->getMessage();
        }

        return $post;
    }

    public function update(mixed $postData, Post $post): Post|string
    {
        try {
            DB::beginTransaction();

            $category = $postData['category'];
            $tags = $postData['tags'];

            unset($postData['category']);
            unset($postData['tags']);

            $postData = $this->categoryHelper($postData, $category);
            $tagsId = $this->tagsHelper($tags);

            $post->update($postData);
            $post->tags()->sync($tagsId);

            DB::commit();
        } catch (\Exception|\Throwable $e) {
            Db::rollBack();

            return $e->getMessage();
        }

        return $post->refresh();
    }

    private function categoryHelper(mixed $postData, array $category): mixed
    {
        if (isset($category['id'])) {
            Category::find($category['id'])->update($category);
            $postData['category_id'] = $category['id'];
        } else {
            $category = Category::create($category);
            $postData['category_id'] = $category->id;
        }

        return $postData;
    }

    private function tagsHelper(array $tags): array
    {
        $tagsId = [];

        foreach ($tags as $tag) {
            if (isset($tag['id']) && isset($tag['title'])) {
                Tag::find($tag['id'])->update($tag);
            } elseif (isset($tag['title'])) {
                $tag = Tag::create($tag);
            }

            $tagsId[] = $tag['id'];
        }

        return $tagsId;
    }
}
