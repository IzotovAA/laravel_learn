<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = [];

    // в данном отношении ни в постах ни в тагах нет айди друг друга, отношения прописаны в третьей таблице post_tag
    // поэтому используем отношение tag Belongs posts, у тега может быть много постов, поэтому BelongsToMany
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    // в tags нет колонки post_id, использовать HasMany не корректно
//    public function posts(): HasMany
//    {
//        return $this->hasMany(Post::class);
//    }
}
