<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

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
        View::composer(['admin.category.create', 'admin.category.edit', 'admin.product.create', 'admin.product.edit'], function($view){
            $view->with('categories', Category::all());          
        });
        View::composer(['layouts.app'], function($view){
            $view->with('tree', Category::getTree());          
        });
        View::composer(['admin.product.create', 'admin.product.edit'], function($view){
            $view->with('colors', DB::table('colors')->get());          
        });
        View::composer(['admin.product.create', 'admin.product.edit'], function($view){
            $view->with('sizes', DB::table('sizes')->get());          
        });

        Paginator::useBootstrap();
    }
}
