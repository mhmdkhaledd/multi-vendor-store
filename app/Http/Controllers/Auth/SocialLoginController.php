<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
       return Socialite::driver('$provider')->redirect();

    }


    public function callback($provider)
    {
        $provider_user = Socialite::driver($provider)->user();

        $user = User::where([
            'provider'=>$provider,
            'provider_id'=>$provider_user->id,
        ])->first();

        Auth::login($user);

        return redirect()->route('home');

    }

}
