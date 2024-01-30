<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
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
       
        \URL::forceScheme('https');
        Paginator::useBootstrap();
        if( Schema::hasTable('categories') ) {
            
            $categories = Category::withCount('posts')->orderBy('posts_count', 'DESC')->take(10)->get();
            View::share('navbar_categories', $categories);

        
        }
       
    }
}
