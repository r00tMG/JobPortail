<?php

use App\Http\Controllers\CandidatureController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\employeur\EmploiController;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');
##['middleware' => ['auth', 'role:employer']
Route::prefix('employeur')->middleware(['auth','role:employeur'])->group(function(){
    Route::resource('emplois',EmploiController::class)->except('show');
});
Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('emploi/{emploi}',[HomeController::class,'show'])->middleware(['auth','role:candidat'])->name('emplois.show');

Route::post('candidature/{emploi}/emploi',[CandidatureController::class,'candidature'])->middleware('auth')->name('emplois.candidature');
Route::get('candidature',[CandidatureController::class,'listCandidat'])->middleware(['auth','role:employeur'])->name('emplois.listCandidat');
Route::post('candidature/{candidature}/contact',[CandidatureController::class,'contact'])->middleware(['auth','role:employeur'])->name('contact.candidature');

Route::group(['middleware' => ['auth','role:Admin']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
