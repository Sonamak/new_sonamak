<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\BannerController;
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

Route::get('/','Admin\AdminController@index');

Sonamak::routes();

Route::post('tour/feature/{tour}','Admin\TourController@feature')->name('tour.feature');
Route::post('destination/popular/{destination}','Admin\DestinationController@popular')->name('destination.popular');
Route::post('price/top/{price}','Admin\PriceController@bestSelling')->name('price.top');

Route::group(['prefix' => 'setup'],function () {

    Route::get('/',[SetupController::class,'index'])->name('setup.index');
    Route::post('/store','Admin\SetupController@store')->name('setup.store');

});

Route::group(['prefix' => 'social'],function () {

    Route::get('/',[SocialController::class,'index'])->name('social.index');
    Route::post('/store',[SocialController::class,'create'])->name('social.store');
    Route::post('/delete/{social}',[SocialController::class,'delete'])->name('social.delete');

});


Route::group(['prefix' => 'banner'],function () {

    Route::get('/',[BannerController::class,'index'])->name('banner.index');
    Route::post('/store',[BannerController::class,'store'])->name('banner.store');

});
