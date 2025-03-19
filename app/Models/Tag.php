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

//    public function posts(): BelongsToMany
//    {
//        return $this->belongsToMany(Post::class);
//    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
