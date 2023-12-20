<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Blog;
use TCG\Voyager\Models\Category;

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
        View::composer('layouts.footer', function ($view) {
            $kategori = Category::take(7)->get(); 
            $recentPosts = Blog::with('categories')
                ->where('status', 'PUBLISHED')
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get();

            $view->with([
                'categories' => $kategori,
                'recentPosts' => $recentPosts,
            ]);
        });


    }
}
