<?php

namespace App\Pipelines\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;


class TitleFilter implements FilterInterface
{
    public const string FILTER = 'title';

    public function handle(Builder $builder, Closure $next): Builder
    {
        if (!request()->has(self::FILTER) || request()->input(self::FILTER) === null) {
            return $next($builder);
        }

        return $next($builder)->where(self::FILTER, 'like', '%' . request()->input(self::FILTER) . '%');
    }
}
