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

    return view('users.athlete_ request');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

Route::post('/users/athletes',  [App\Http\Controllers\guardarAtletaController::class, 'guardado'])->name('athletes.guardado');
  
Route::get('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_request');

Route::delete('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'destroy'])->name('athlete_delete');

Route::delete('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'acceptedAthlete'])->name('athlete_accepted');

