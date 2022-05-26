<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\ActiveLinkController;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\ChartController;
use App\Models\Inquirty;
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


Route::group(['prefix' => 'category'],function () {
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    Route::post('/store',[CategoryController::class,'create'])->name('category.store');
    Route::post('/delete/{category}',[CategoryController::class,'delete'])->name('category.delete');
});


Route::group(['prefix' => 'info'],function () {
    Route::get('/',[InfoController::class,'index'])->name('info.index');
    Route::post('/store',[InfoController::class,'store'])->name('info.store');
});


Route::group(['prefix' => 'messages'],function () {
    Route::get('/inquirty',[InquiryController::class,'index'])->name('inquirty.index');
    Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
    Route::get('/reservation',[ReservationController::class,'index'])->name('reservation.index');
});

Route::get('/chart/{model}',[ChartController::class,'chart'])->name('chart');


