<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\FrontController;
use App\Models\Tour;
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

Auth::routes();

Route::get('/',[FrontController::class,'home']);

Route::group(['prefix' => 'cookie'],function(){
    Route::get('/language/{language}',[CookieController::class,'language']);
    Route::get('/currency/{currency}',[CookieController::class,'currency']);
});