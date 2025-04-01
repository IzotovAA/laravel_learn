<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tags = $this->resource->tags->pluck('title')->toArray();
        $tags = join(', ', $tags);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->resource->category->title,
            'image' => $this->image,
            'likes' => $this->likes,
            'tags' => $tags,
        ];
    }
}
