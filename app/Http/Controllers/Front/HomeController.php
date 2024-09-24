<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products =product::with('category')->active()
            ->latest()
            ->take(16)
            ->get();
         return view('front.home',compact('products'));
    }
}
