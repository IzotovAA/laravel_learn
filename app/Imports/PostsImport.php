<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class PostsImport implements ToCollection, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function collection(Collection $collection): void
    {
        try {
            DB::beginTransaction();

            foreach ($collection as $row) {
                $post = Post::firstOrCreate(
                    [
                        'title' => $row['title'],
                    ],
                    [
                        'content' => $row['content'],
                        'image' => $row['image'],
                        'category_id' => $row['category_id'],
                    ]
                );

                $post->tags()->sync(explode(',', $row['tags_id']));
            }

            DB::commit();
        } catch (\Throwable $e) {
            try {
                DB::rollBack();
            } catch (\Throwable $e) {
                $this->output->error($e->getMessage());
            }

            $this->output->error($e->getMessage());
        }
    }
}
