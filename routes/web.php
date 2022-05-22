<?php

use App\Helpers\Sonamak;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InquiryController;
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
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/privacy',[FrontController::class,'privacy'])->name('privacy');
Route::get('/faq',[FrontController::class,'faq'])->name('faq');



Route::group(['prefix' => 'cookie'],function(){
    Route::get('/language/{language}',[CookieController::class,'language'])->name('language');
    Route::get('/currency/{currency}',[CookieController::class,'currency'])->name('currency');
});

//Front Pages
Route::group(['prefix' => 'tour'],function(){
    Route::get('/search',[FrontController::class,'tourSearchExtra'])->name('extra');
    Route::get('/discover',[FrontController::class,'discover'])->name('discover');
    Route::post('/filter',[FrontController::class,'tourFilter'])->name('tour.filter');
    Route::get('/{tour}',[FrontController::class,'tour'])->name('tour.details');
});

Route::group(['prefix' => 'destination'],function(){
    Route::get('/',[FrontController::class,'destinationAll'])->name('destinations');
    Route::get('/{destination}',[FrontController::class,'destinationTours'])->name('destinations.tours');
});

Route::group(['prefix' => 'blog'],function(){
    Route::get('/',[FrontController::class,'blogs'])->name('blogs');
    Route::get('/{blog}',[FrontController::class,'blog'])->name('blog.front');
});

Route::get('share/{provider}',[FrontController::class,'share'])->name('share');

// Contacts

Route::post('inquiry',[InquiryController::class,'create'])->name('inquiry');
Route::post('reserved',[ReservationController::class,'create'])->name('reserved');

Route::group(['prefix' => 'contact'],function(){
    Route::get('/',[FrontController::class,'contact']);
    Route::post('/contact',[ContactController::class,'create'])->name('contact');
});

Route::get('/test',function(){
});
