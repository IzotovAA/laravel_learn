<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

//    use Filterable;

    protected $table = 'posts';
    protected $guarded = [];

    // в posts есть колонка category_id, поэтому posts Belongs categories
    // пост может иметь только одну категорию поэтому BelongsTo
    // обратная связь будет categories HasMany posts, т.к. в posts есть колонка category_id
    // одна категория может принадлежать многим постам поэтому HasMany
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // в данном отношении ни в постах ни в тагах нет айди друг друга, отношения прописаны в третьей таблице post_tag
    // поэтому используем отношение Belongs, у поста может быть несколько тегов, поэтому BelongsToMany
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // выдаёт ошибку (в tags нет колонки post_id)
//    public function tags(): HasMany
//    {
//        return $this->hasMany(Tag::class);
//    }
}
