<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::post('project/feature/{project}',[ProjectController::class,'toggleFeature'])->name('project.feature');

Route::group(['prefix' => 'setup'],function () {

    Route::get('/',[SetupController::class,'index'])->name('setup.index');
    Route::post('/store','Admin\SetupController@store')->name('setup.store');

});


Route::group(['prefix' => 'info'],function () {
    Route::get('/',[InfoController::class,'index'])->name('info.index');
    Route::post('/store',[InfoController::class,'store'])->name('info.store');
});


Route::group(['prefix' => 'banner'],function () {
    Route::get('/',[BannerController::class,'index'])->name('banner.index');
    Route::post('/store',[BannerController::class,'store'])->name('banner.store');
});

Route::get('/chart/{model}',[ChartController::class,'chart'])->name('chart');


