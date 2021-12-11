<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Cache::has('categories')) {
            $categories = Cache::get('categories');
        } else {
            $categories = Category::with('posts')->withCount('posts')->orderBy('posts_count', 'desc')->get();
            Cache::put('categories', $categories, 30);
        }
        /*        $categories = Category::with('posts')->withCount('posts')->orderBy('posts_count','desc')->get();*/
        View::share('categories', $categories);

        view()->composer('layouts.sidebar', function ($view) {
            $view->with('popular_posts', Post::orderBy('view', 'desc')->limit(5)->get());
        });
    }
}

