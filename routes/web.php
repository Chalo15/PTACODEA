<?php

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

Route::get('/', function () {

    return view('auth.login');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\AthleteController::class, 'a_p_d'])->name('home');

Route::get('/users', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_module');

Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

Route::post('/users/athletes',  [App\Http\Controllers\guardarAtletaController::class, 'guardado'])->name('athletes.guardado');
  
Route::get('/users', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_request');

