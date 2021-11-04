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

    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\AthleteController::class, 'a_p_d'])->name('home');

Route::get('/users', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_module');

Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

Route::post('/users/athletes',  [App\Http\Controllers\guardarAtletaController::class, 'guardado'])->name('athletes.guardado');
  
Route::get('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_request');

Route::delete('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'destroy'])->name('athlete_delete');

Route::delete('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'acceptedAthlete'])->name('athlete_accepted');

Route::get('/coach', [App\Http\Controllers\CoachController::class, 'index'])->name('coach_interface.blade');

Route::get('/users/instructor', [App\Http\Controllers\UsersController::class, 'vistaPracticas'])->name('practicas');
Route::get('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'index'])->name('athletes_index');

Route::post('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'addDataSession'])->name('athletes.add');



Route::post('/users/instructor', [App\Http\Controllers\UsersController::class, 'guardarPractica'])->name('instructor.practica');

Route::get('/users/athlete_data_session', [App\Http\Controllers\UsersController::class, 'vistaPracticaExtra']);

Route::get('test', function () {

    return view('PruebaCKEDITOR.vistackeditor');
});

Route::post('test', function (Request $request) {
    dd($request->all());
})->name("testF");
