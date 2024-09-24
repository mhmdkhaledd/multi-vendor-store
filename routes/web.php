<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index'])->name('home');

Route::get('/products',[\App\Http\Controllers\Dashboard\productsController::class,'index'])->name('products.index');
Route::get('/products/{product:slug}',[\App\Http\Controllers\Dashboard\productsController::class,'show'])->name('products.show');
Route::resource('cart',\App\Http\Controllers\Front\CartController::class);
Route::get('checkout',[\App\Http\Controllers\Front\CheckoutController::class, 'create'])->name('checkout');
Route::post('checkout',[\App\Http\Controllers\Front\CheckoutController::class, 'store']);


Route::get('auth/user/2fa',[\App\Http\Controllers\Front\Auth\TwoFactorAuthenticationController::class,'index'])->name('front.2fa');



Route::get('/dash',function (){
   return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('auth/{provider}/redirect',[\App\Http\Controllers\Auth\SocialLoginController::class,'redirect'])->name('auth.socialite.redirect');

Route::get('auth/{provider}/callback',[\App\Http\Controllers\Auth\SocialLoginController::class,'callback'])->name('auth.socialite.callback');





Route::get('/local/{lang}',[\App\Http\Controllers\LocalController::class,'setLocal']);

//require __DIR__.'/auth.php';

require  __DIR__.'/dashboard.php';
