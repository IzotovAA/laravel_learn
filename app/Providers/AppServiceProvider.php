<?php

namespace App\Providers;

use App\Pipelines\Filters\CategoryIdFilter;
use App\Pipelines\Filters\ContentFilter;
use App\Pipelines\Filters\TitleFilter;
use App\Pipelines\PostPipeline;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(PostPipeline::class, function () {
            return new PostPipeline([
                TitleFilter::class,
                ContentFilter::class,
                CategoryIdFilter::class,
            ]);
        });
    }
}
