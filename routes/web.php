<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PropertyparticulierController;
use App\Http\Controllers\PropretyController;
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

Route::get('/',[HomeController::class,'index'] )->name('saido');
Route::get('/biens',[PropertyparticulierController::class,'index'] )->name('said.index');
Route::get('/biens/{slug}-{i}',[PropertyparticulierController::class,'show'] )->name('bitch.show');
Route::post('/biens/{i}/contact',[PropertyparticulierController::class,'contact'])->name('said.contact');

Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'dologin']);
Route::delete('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('property', PropretyController::class)->except(['show']);
    Route::resource('options', OptionController::class)->except(['show']);

});

