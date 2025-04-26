<?php

namespace App\Providers;


use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class ShareDataProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
       view()->composer(['moreData', 'anotherData'], function ($view) {
           $view->with('blogs', Blog::all());
       });
       
    }
}
