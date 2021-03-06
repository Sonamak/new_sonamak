<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\FrontController;
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

Route::get('/projects',[FrontController::class,'project'])->name('projects.all');
Route::get('/project/{project}',[FrontController::class,'singleProject'])->name('project.show');
Route::get('/contact',[FrontController::class,'contact'])->name('contact.us');
Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::post('/contact/store',[ContactController::class,'store'])->name('store.contact');
Auth::routes();