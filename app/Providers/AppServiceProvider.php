<?php

namespace App\Providers;

use App\Components\ImportDataClient;
use App\Models\User;
use App\Pipelines\Filters\CategoryIdFilter;
use App\Pipelines\Filters\ContentFilter;
use App\Pipelines\Filters\TitleFilter;
use App\Pipelines\PostPipeline;
use App\Policies\AdminPolicy;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Gate;
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

        Gate::policy(User::class, AdminPolicy::class);

        $this->app->bind(Client::class, function () {
            return new Client([
                'base_uri' => 'https://jsonplaceholder.typicode.com/',
                'timeout' => 2.0,
            ]);
        });

//        $this->app->bind(ImportDataClient::class, function (Application $app) {
//            return new ImportDataClient($app->make(Client::class));
//        });
    }
}
