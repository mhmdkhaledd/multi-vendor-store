<?php

namespace App\Facades;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\Facade;

class cart extends Facade
{
protected static function getFacadeAccessor()
{
    return CartRepository::class;
}
}
