<?php

use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CandidatureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::delete('logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');
Route::post('register',[AuthController::class,'register'])->middleware('guest')->name('register');
#
Route::group(['middleware' => ['auth','role:Admin']],function(){
    Route::resource('users',AuthController::class);
});
#
#

Route::group(['middleware' => ['auth','role:employeur']],function(){
    Route::resource('emplois', ApiJobController::class)->except('create','edit');
    Route::get('candidatures', [CandidatureController::class,'index'])->name('candidatures');
});



