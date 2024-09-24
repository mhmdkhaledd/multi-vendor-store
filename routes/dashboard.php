<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard\CategoriesController;



Route::middleware(['auth'])->as('dashboard.')->prefix('/dashboard')->group(function () {

    Route::get('profile',[\App\Http\Controllers\Dashboard\profileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile',[\App\Http\Controllers\Dashboard\profileController::class, 'update'])->name('profile.update');


    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])
        ->name('dashboard');

    Route::get('/categories/trashed',[CategoriesController::class, 'trashed'])->name('categories.trashed');

    Route::put('/categories/{category}/restore',[CategoriesController::class, 'restore'])->name('categories.restore');

    Route::delete('/categories/{category}/force-delete',[CategoriesController::class, 'forcedelete'])->name('categories.force-delete');

    Route::resource('/categories', CategoriesController::class);

    Route::resource('/products',\App\Http\Controllers\dashboard\productsController::class );

    Route::resource('/roles',\App\Http\Controllers\dashboard\RolesController:: class);







});
