<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title='store';

        $user = Auth::user();

         return view('dashboard.index',[
             'user'=>'mohamed',
             'title'=>$title
         ]);
    }
}
