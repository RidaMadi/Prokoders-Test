<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('checkRole:user')->group(function () {//this is for user


    Route::controller(\App\Http\Controllers\PopupFactoryPattern\CreatePopupsFactory::class)->group(function () {
        Route::post('create', 'createPopups');
        Route::post('edit', 'editPopups');
        Route::post('delete', 'deletePopups');
    });

    Route::controller(\App\Http\Controllers\ContentsPopupFactoryPattern\FactoryController::class)->group(function () {
        Route::post('create', 'createElement');
        Route::post('edit', 'editElement');
        Route::post('delete', 'deleteElement');
    });
});
