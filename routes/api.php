<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();
});

Route::apiResource('products',\App\Http\Controllers\Api\ProductsController::class);

Route::post('auth/access-tokens',[\App\Http\Controllers\Api\AccessTokenController::class,'store'])
->middleware('guest:sanctum');

Route::delete('auth/access-tokens/{token?}',[\App\Http\Controllers\Api\AccessTokenController::class,'destroy'])
    ->middleware('auth:sanctum');
