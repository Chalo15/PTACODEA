<?php
use App\Models\Athlete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {

    return view('auth.login');


});

Auth::routes();
//menu principal de super usuario
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['can:roles,"Admin"']);
//menu principal de Atletas
//Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'inicio'])->name('welcome');

//retorno de vista de formulario de registro de atletas
Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes')->middleware(['can:roles,"Atleta","Admin","Musculacion"']);

//guardado de registro de atletas
Route::post('/users/athletes',  [App\Http\Controllers\AthleteController::class, 'guardado'])->name('athletes.guardado');

//retorna vista de menu principal de instructor
Route::get('/coach/coach_interface', [App\Http\Controllers\CoachController::class, 'index'])->name('coach_interface.blade');

//retorno de vista de tabla de atletas por disciplina
Route::get('/coach/registrar', [App\Http\Controllers\AthleteController::class, 'a_p_d'])->name('datosatletas');

Route::get('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'index'])->name('athlete_Res');

Route::delete('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'destroy'])->name('athlete_delete');

Route::post('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'acceptedAthlete'])->name('athlete_accepted');

//retorna vista de fromulario de registro de datos de instructor
Route::get('/users/instructor', [App\Http\Controllers\UsersController::class, 'vistaPracticas'])->name('practicas')->middleware(['can:roles,"Atleta","Admin","Musculacion"']);
//retorno de vista de datos extra
Route::get('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'index'])->name('athletes_index');
//guardado de datos extra de deatos de instructor
Route::post('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'addDataSession'])->name('athletes.add');


//guarda datos de entrenamiento diario
Route::post('/users/instructor', [App\Http\Controllers\UsersController::class, 'guardarPractica'])->name('instructor.practica');


Route::post('/users/funcionarios',[App\Http\Controllers\FunctionaryController::class,'guardarFuncionario'])->name('funcionarios.guardarFuncionario');

Route::get('/users/funcionarios',[App\Http\Controllers\FunctionaryController::class,'vistaFuncionario'])->name('funcionarios')->middleware(['can:roles,"Instructor","Admin","Musculacion"']);

Route::post('/users/coaches',[App\Http\Controllers\CoachController::class,'guardarCoach'])->name('coach.guardarCoach');

Route::get('/users/coaches',[App\Http\Controllers\CoachController::class,'vistaCoaches'])->name('coaches');
