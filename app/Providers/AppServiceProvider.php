<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

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
        Schema::defaultStringLength(191);

        View::share('categories',$categories=Category::all());
        View::share('carts',$carts=Cart::all());
        View::share('orders',$orders=Order::all());
    }
}
