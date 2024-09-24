<?php

namespace App\View\Components;

use App\Facades\cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function Symfony\Component\Translation\t;

class CartMenu extends Component
{

    public $items;
    public $total;


    public function __construct()
    {
        $this->items =cart::get();
        $this->total =cart::total();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-menu');
    }
}
