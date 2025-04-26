<?php

namespace App\Providers;

use App\Interfaces\BlogRepositoryInterface;
use App\Interfaces\PostLogRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\PostLogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(PostLogRepositoryInterface::class, PostLogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
