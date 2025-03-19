<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        $tags = Tag::factory(5)->create();
        $posts = Post::factory(500)->create();

        foreach ($posts as $post) {
            $tagsIds = $tags->random(3)->pluck('id');
            $post->tags()->attach($tagsIds);
        }
    }
}
