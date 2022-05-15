<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\TourController;
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

Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/terms',[FrontController::class,'terms'])->name('terms');
Route::get('/extra',[FrontController::class,'terms'])->name('terms');
Route::get('/destinations',[FrontController::class,'terms'])->name('destinations');



Route::group(['prefix' => 'cookie'],function(){
    Route::get('/language/{language}',[CookieController::class,'language'])->name('language');
    Route::get('/currency/{currency}',[CookieController::class,'currency'])->name('currency');
});

//Front Pages
Route::group(['prefix' => 'tour'],function(){
    Route::get('/search',[FrontController::class,'tourSearch'])->name('extra');
    Route::post('/filter',[FrontController::class,'tourFilter'])->name('tour.filter');
    Route::get('/{tour}',[FrontController::class,'tour'])->name('tour.details');
});

Route::group(['prefix' => 'destination'],function(){
    Route::get('/{destination}',[FrontController::class,'destinationTours'])->name('destinations.tours');
});

Route::get('share/{provider}',[FrontController::class,'share'])->name('share');

Route::get('/test',function(){
});
