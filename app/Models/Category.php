<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = [];

    // в таблице posts есть столбец category_id поэтому Has
    // одной категории может принадлежать много постов поэтому HasMany
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
