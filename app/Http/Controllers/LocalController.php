<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalController extends Controller
{
    public function setLocal($lang)
    {
       if (in_array($lang,['en','ar'])){

           App::setLocale($lang);
           Session::put('local',$lang);
   }
       return back();
    }
}
