<?php

use App\Models\Athlete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    return view('auth.login');
});
// LOS MIDDLEWARE SE USAN SOLO EN LAS RUTAS ****GET**** NO EN LOS ****POST****
Auth::routes();
//Menu Principal de los Roles
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//menu principal de Atletas
//Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'inicio'])->name('welcome');

//retorno de vista de formulario de registro de atletas
Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

//guardado de registro de atletas
Route::post('/users/athletes',  [App\Http\Controllers\AthleteController::class, 'guardado'])->name('athletes.guardado');

//retorno de vista de formulario de registro de atletas externos
Route::get('/users/externalathletes', [App\Http\Controllers\ExternalAthleteController::class, 'index'])->name('external_athletes');

//guardado de registro de atletas Externos
Route::post('/users/externalathletes',  [App\Http\Controllers\ExternalAthleteController::class, 'guardado'])->name('external_athletes.guardado');

//retorna vista de perfil personal de atleta
Route::get('/users/athlete_profile', [\App\Http\Controllers\AthleteController::class, 'vistaPerfil'])->name('perfil.atleta')->middleware(['can:roles, "Admin","Instructor","Funcionario","Atleta"']);
//guarda las modificaciones del perfil del atleta
Route::put('users/athlete_profile', [App\Http\Controllers\AthleteController::class, 'guardaPerfil'])->name('saveProfile');
//retorna vista de menu principal de instructor
Route::get('/coach/coach_interface', [App\Http\Controllers\CoachController::class, 'index'])->name('coach_interface.blade')->middleware(['can:roles,"Admin","Instructor"']);

//retorno de vista de tabla de atletas por disciplina
Route::get('/coach/registrar', [App\Http\Controllers\AthleteController::class, 'a_p_d'])->name('datosatletas')->middleware(['can:roles,"Admin","Funcionario","Instructor"']);
//Vista de solicitudes pendientes
Route::get('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'index'])->name('athlete_Res')->middleware(['can:roles,"Admin"']);
//Elimina las solicitudes de atletas no deseados
Route::put('/users/athlete_request/{user}', [App\Http\Controllers\athlete_requestsController::class, 'destroy'])->name('athlete_delete');
//Guarda los datos de las solicitudes de atletas aprovadas o rechazadas
Route::put('/users/athlete_request', [App\Http\Controllers\athlete_requestsController::class, 'acceptedAthlete'])->name('athlete_accepted');

//retorna vista de fromulario de registro de datos de instructor
Route::get('/users/instructor', [App\Http\Controllers\UsersController::class, 'vistaPracticas'])->name('practicas')->middleware(['can:roles,"Instructor","Admin"']);
//retorno de vista de datos extra
Route::get('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'index'])->name('athletes_index')->middleware(['can:roles,"Admin","Instructor"']);
//guardado de datos extra de datos de instructor
Route::post('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'addDataSession'])->name('athletes.add');


//guarda datos de entrenamiento diario
Route::post('/users/instructor', [App\Http\Controllers\UsersController::class, 'guardarPractica'])->name('instructor.practica');

//Guarda los datos del nuevo funcionario
Route::post('/users/funcionarios', [App\Http\Controllers\FunctionaryController::class, 'guardarFuncionario'])->name('funcionarios.guardarFuncionario');
//Vista del formulario de agregar funcionarios
Route::get('/users/funcionarios', [App\Http\Controllers\FunctionaryController::class, 'vistaFuncionario'])->name('funcionarios')->middleware(['can:roles,"Admin"']);
//Guarda los datos del nuevo entrenador
Route::post('/users/coaches', [App\Http\Controllers\CoachController::class, 'guardarCoach'])->name('coach.guardarCoach');
//Vista del formulario de agregar entrenadores
Route::get('/users/coaches', [App\Http\Controllers\CoachController::class, 'vistaCoaches'])->name('coaches')->middleware(['can:roles,"Admin"']);
//Guarda los datos del nuevo Usuario
Route::post('/users/register', [App\Http\Controllers\UsersController::class, 'guardarUsuario'])->name('user.guardarUser');
//Vista del formulario de agregar Usuarios
Route::get('/users/register', [App\Http\Controllers\UsersController::class, 'index'])->name('register');

//Vista para visualizar datos del atleta
Route::get('/athletes/verdatos/{athlete}', [App\Http\Controllers\AthleteController::class, 'vistaDatos'])->name('datos')->middleware(['can:roles,"Admin","Atleta"']);

//Vista del formulario de agregar extra de usuarios
Route::get('/users/athlete_extra_data', [App\Http\Controllers\ExtraDataController::class, 'datos_extra'])->name('datos_extra');
//Añadido de los datos extra del atleta
Route::post('/users/athlete_extra_data', [App\Http\Controllers\ExtraDataController::class, 'add_extra_data'])->name('add_extra_data');


Route::get('/config/ckeditor', [App\Http\Controllers\SportController::class, 'index'])->name('vista.ckeditor')->middleware(['can:roles,"Admin","Instructor"']);
Route::put('/config/ckeditor/{sport}', [App\Http\Controllers\SportController::class, 'edit'])->name('ckeditor');

//Vista de Atletas Registrados
Route::get('/athletes/viewathlete', [App\Http\Controllers\AthleteController::class, 'index_athleteview'])->name('athletesview')->middleware(['can:roles,"Admin"']);
//Modificar datos de atleta
//Ver datos específicos
//Eliminar un atleta
Route::put('/athletes/viewathlete/{athlete}', [App\Http\Controllers\AthleteController::class, 'athleteview_delete'])->name('athlete.delete');

