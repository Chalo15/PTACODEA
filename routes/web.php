<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {

    return view('auth.login');
});

Auth::routes();
//menu principal de super usuario
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get('/users', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_module');

//retorno de vista de formulario de registro de atletas
Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

//guardado de registro de atletas
Route::post('/users/athletes',  [App\Http\Controllers\guardarAtletaController::class, 'guardado'])->name('athletes.guardado');
  
//Route::get('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_request');

//Route::delete('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'destroy'])->name('athlete_delete');

//Route::delete('/users/athlete_request', [App\Http\Controllers\Atleta_moduleController::class, 'acceptedAthlete'])->name('athlete_accepted');

//retorna vista de menu principal de instructor
Route::get('/coach/coach_interface', [App\Http\Controllers\CoachController::class, 'index'])->name('coach_interface.blade');

//retorno de vista de tabla de atletas por disciplina
Route::get('/coach/registrar', [App\Http\Controllers\AthleteController::class, 'a_p_d'])->name('datosatletas');



//retorna vista de fromulario de registro de datos de instructor
Route::get('/users/instructor', [App\Http\Controllers\UsersController::class, 'vistaPracticas'])->name('practicas');
//retorno de vista de datos extra
Route::get('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'index'])->name('athletes_index');
//guardado de datos extra de deatos de instructor
Route::post('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'addDataSession'])->name('athletes.add');


//guarda datos de entrenamiento diario
Route::post('/users/instructor', [App\Http\Controllers\UsersController::class, 'guardarPractica'])->name('instructor.practica');



