<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\ActiveLinkController;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\ChartController;
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

Route::get('/','Admin\AdminController@index')->name('dashboard');

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

Route::group(['prefix' => 'category'],function () {
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    Route::post('/store',[CategoryController::class,'create'])->name('category.store');
    Route::post('/delete/{category}',[CategoryController::class,'delete'])->name('category.delete');
});

Route::group(['prefix' => 'schedule'],function () {
    Route::get('/',[ScheduleController::class,'index'])->name('schedule.index');
    Route::post('/store',[ScheduleController::class,'create'])->name('schedule.store');
});

Route::group(['prefix' => 'active_link'],function () {
    Route::get('/',[ActiveLinkController::class,'index'])->name('active.index');
    Route::post('/toggle/{activeLink}',[ActiveLinkController::class,'toggleActive'])->name('active.toggle');
});

Route::group(['prefix' => 'info'],function () {
    Route::get('/',[InfoController::class,'index'])->name('info.index');
    Route::post('/store',[InfoController::class,'store'])->name('info.store');
});

Route::get('/chart/{model}',[ChartController::class,'chart'])->name('chart');


