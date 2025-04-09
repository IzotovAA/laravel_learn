<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Post::withTrashed()->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'title',
            'content',
            'image',
            'likes',
            'is_published',
            'created_at',
            'updated_at',
            'deleted_at',
            'category_id',
        ];
    }
}
