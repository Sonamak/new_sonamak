<?php

use App\Helpers\Sonamak;
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
