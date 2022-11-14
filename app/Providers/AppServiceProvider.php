<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\BlogCateagory;

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
//        View::share('name','YS');
        View::composer(['front.includes.header','front.articles.details'],function ($view){
            $view->with('blogCategories' , BlogCateagory::where('status',1)->select('id','category_name')->get());
        });
        Paginator::useBootstrapFour();

    }
}
