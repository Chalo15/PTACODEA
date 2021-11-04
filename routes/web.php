<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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

    return view('home');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\AthleteController::class, 'a_p_d'])->name('home');

Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

Route::post('/users/athletes',  [App\Http\Controllers\guardarAtletaController::class, 'guardado'])->name('athletes.guardado');

Route::get('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'index'])->name('athletes_index');

Route::post('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'addDataSession'])->name('athletes.add');

Route::get('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'index'])->name('athlete_Res');

Route::delete('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'destroy'])->name('athlete_delete');

Route::post('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'acceptedAthlete'])->name('athlete_accepted');

//Rutas de los funcionarios

Route::post('user/funcionarios',[App\Http\Controllers\UsersController::class,'guardarFuncionario'])->name('funcionarios.guardarFuncionario');

Route::get('users/funcionarios',[App\Http\Controllers\UsersController::class,'vistaFuncionario'])->name('funcionarios');
