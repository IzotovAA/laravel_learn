<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
//    use Filterable;

    protected $table = 'posts';
    protected $guarded = [];

    // нет ошибки
//    public function category(): BelongsTo
//    {
//        return $this->belongsTo(Category::class);
//    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // выдаёт ошибку
//    public function tags(): HasMany
//    {
//        return $this->hasMany(Tag::class);
//    }
}
