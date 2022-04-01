<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\View;
use App\Modules\Cart\Models\Cart;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Collection;
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
       
        view()->composer('*', function ($view2) 
        {  
            $cartt = Cart::where('user_id', Auth::id())->get();
            $view2->with('cartt', $cartt );  
        });
    }

    
}
