<?php

namespace App\Providers;

use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(CartRepository::class,function (){
            return new CartModelRepository();
        });
    }



    public function boot(): void
    {
        //
    }
}
