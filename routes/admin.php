<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\SetupController;
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

Route::group(['prefix' => 'setup'],function () {

    Route::get('/',[SetupController::class,'index'])

});

Route::group(['prefix' => 'setup'],function(){
    Route::post('/store','Admin\SetupController@store')->name('setup.store');
});
