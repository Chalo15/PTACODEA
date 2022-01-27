<?php

use App\Http\Controllers\AthleteController;
use App\Http\Controllers\AthletesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PhysiosController;
use App\Http\Controllers\MuscularsController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\UsersController;
use App\Models\Athlete;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Rutas de autenticación.
 */
Auth::routes();

/**
 * Ruta de Inicio
 */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Rutas de Usuarios
 */
Route::prefix('users')->group(function () {
    Route::get('', [UsersController::class, 'index'])->name('users.index');
    Route::get('create', [UsersController::class, 'create'])->name('users.create');
    Route::post('', [UsersController::class, 'store'])->name('users.store');
    Route::get('{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('{user}', [UsersController::class, 'update'])->name('users.update');
});

/**
 * Rutas de Deportes
 */
Route::prefix('sports')->group(function () {
    Route::get('', [SportsController::class, 'index'])->name('sports.index');
    Route::get('{sport}', [SportsController::class, 'show'])->name('sports.show');
    Route::get('{sport}/edit', [SportsController::class, 'edit'])->name('sports.edit');
    Route::put('{sport}', [SportsController::class, 'update'])->name('sports.update');
});

/**
 * Rutas de Atletas
 */
Route::prefix('athletes')->group(function () {
    Route::get('', [AthletesController::class, 'index'])->name('athletes.index');
    Route::get('create', [AthletesController::class, 'create'])->name('athletes.create');
    Route::post('', [AthletesController::class, 'store'])->name('athletes.store');
    Route::get('{athlete}', [AthletesController::class, 'show'])->name('athletes.show');
    Route::get('{athlete}/edit', [AthletesController::class, 'edit'])->name('athletes.edit');
    Route::put('{athlete}', [AthletesController::class, 'update'])->name('athletes.update');
});

Route::prefix('musculars')->group(function () {
    Route::get('', [MuscularsController::class, 'index'])->name('musculars.index');
    Route::get('create', [MuscularsController::class, 'create'])->name('musculars.create');
    Route::post('', [MuscularsController::class, 'store'])->name('musculars.store');
    Route::get('{muscular}', [MuscularsController::class, 'show'])->name('musculars.show');
    Route::get('{muscular}/edit', [MuscularsController::class, 'edit'])->name('musculars.edit');
    Route::put('{muscular}', [MuscularsController::class, 'update'])->name('musculars.update');
});


Route::prefix('physios')->group(function () {
    Route::get('', [PhysiosController::class, 'index'])->name('physios.index');
    Route::get('create', [PhysiosController::class, 'create'])->name('physios.create');
    Route::post('', [PhysiosController::class, 'store'])->name('physios.store');
    Route::get('{physio}', [PhysiosController::class, 'show'])->name('physios.show');
    Route::get('{physio}/edit', [PhysiosController::class, 'edit'])->name('physios.edit');
    Route::put('{physio}', [PhysiosController::class, 'update'])->name('physios.update');
});


Route::prefix('trainings')->group(function () {
    Route::get('', [TrainingsController::class, 'index'])->name('trainings.index');
    Route::get('create', [TrainingsController::class, 'create'])->name('trainings.create');
    Route::post('', [TrainingsController::class, 'store'])->name('trainings.store');
    Route::get('{training}', [TrainingsController::class, 'show'])->name('trainings.show');
    Route::get('{training}/edit', [TrainingsController::class, 'edit'])->name('trainings.edit');
    Route::put('{training}', [TrainingsController::class, 'update'])->name('trainings.update');
});




// LOS MIDDLEWARE SE USAN SOLO EN LAS RUTAS ****GET**** NO EN LOS ****POST****

//Menu Principal de los Roles
//menu principal de Atletas
//Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'inicio'])->name('welcome');

//Retorno de vista formulario de reserva de instalaciones
Route::get('/Reservations/booking_form', [App\Http\Controllers\AthleteController::class, 'Reserva_Form'])->name('booking_form');

/**
 * Rutas de Atletas
 */

//retorno de vista de formulario de registro de atletas
Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

//guardado de registro de atletas
Route::post('/users/athletes',  [App\Http\Controllers\AthleteController::class, 'guardado'])->name('athletes.guardado');

//retorno de vista de formulario de registro de atletas externos
Route::get('/users/externalathletes', [App\Http\Controllers\ExternalAthleteController::class, 'index'])->name('external_athletes');

//guardado de registro de atletas Externos
Route::post('/users/externalathletes',  [App\Http\Controllers\ExternalAthleteController::class, 'guardado'])->name('external_athletes.guardado');

// Route::get('register', function () {
//     $sports = Sport::all();
//     return view('auth.register', compact('sports'));
// });



//Rutas enfocadas en el modulo de perfil de usuario////////////////////////////////////////////////////////////////////////////////////////////////////

//retorna vista de perfil personal de atleta
Route::get('/users/athlete_profile', [\App\Http\Controllers\AthleteController::class, 'vistaPerfil'])->name('perfil.atleta')->middleware(['can:roles, "Admin","Instructor","Funcionario","Atleta","Fisioterapia","Musculacion"']);
//guarda las modificaciones del perfil del atleta
Route::put('users/athlete_profile', [App\Http\Controllers\AthleteController::class, 'guardaPerfil'])->name('saveProfile');
//cambia foto de perfil
Route::get('/users/update_photo', [\App\Http\Controllers\AthleteController::class, 'vistaSelectorFoto'])->name('changePhoto')->middleware(['can:roles, "Admin","Instructor","Funcionario","Atleta","Fisioterapia","Musculacion"']);
//Guarda la foto de perfil seleccionada
Route::post('/users/update_photo',  [App\Http\Controllers\AthleteController::class, 'guardaFoto'])->name('savePhoto');



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

//retorno de vista de datos extra
Route::get('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'index'])->name('athletes_index')->middleware(['can:roles,"Admin","Instructor"']);
//guardado de datos extra de datos de instructor
Route::post('/users/athletes/datasession',  [App\Http\Controllers\SessionDataController::class, 'addDataSession'])->name('athletes.add');


Route::get('/users/instructor/{atleta}', [App\Http\Controllers\UsersController::class, 'vistaPracticas'])->name('practicas')->middleware(['can:roles,"Instructor","Admin"']);
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
// Route::get('/users/register', [App\Http\Controllers\UsersController::class, 'index'])->name('register');

//Vista para visualizar datos del atleta
Route::get('/athletes/verdatos/{athlete}', [App\Http\Controllers\AthleteController::class, 'vistaDatos'])->name('datos')->middleware(['can:roles,"Admin","Atleta"']);

//Vista del formulario de agregar extra de usuarios
Route::get('/users/athlete_extra_data', [App\Http\Controllers\ExtraDataController::class, 'datos_extra'])->name('datos_extra');
//Añadido de los datos extra del atleta
Route::post('/users/athlete_extra_data', [App\Http\Controllers\ExtraDataController::class, 'add_extra_data'])->name('add_extra_data');


Route::get('/config/ckeditor', [App\Http\Controllers\SportController::class, 'index'])->name('vista.ckeditor')->middleware(['can:roles,"Admin","Instructor"']);
Route::put('/config/ckeditor/{sport}', [App\Http\Controllers\SportController::class, 'edit'])->name('ckeditor');



//Registrar datos de atleta por parte del fisioterapeuta
Route::get('/physiotherapy/listAthletes', [App\Http\Controllers\FunctionaryController::class, 'list'])->name('listAthletes')->middleware(['can:roles,"Fisioterapia"']);
Route::get('/physiotherapy/appointment/{id}', [App\Http\Controllers\FunctionaryController::class, 'appointment'])->name('appointment')->middleware(['can:roles,"Fisioterapia"']);

//Registrar datos de atleta por parte del encargado de musculacion

Route::get('/musculation/catalogAthletes',[App\Http\Controllers\FunctionaryController::class,'catalog'])->name('catalogAthletes')->middleware(['can:roles,"Musculacion"']);
Route::get('/musculation/report/{id}',[App\Http\Controllers\FunctionaryController::class,'report'])->name('report')->middleware(['can:roles,"Musculacion"']);

Route::get('/coach/select_athlete', [App\Http\Controllers\SportController::class, 'view_athletes_sports'])->name('vista.athletes_sports')->middleware(['can:roles,"Admin","Instructor"']);
Route::post('/coach/select_athlete/{sport}', [App\Http\Controllers\SportController::class, 'edit'])->name('ckeditor');

Route::get('/musculation/catalogAthletes', [App\Http\Controllers\FunctionaryController::class, 'catalog'])->name('catalogAthletes')->middleware(['can:roles,"Musculacion"']);
Route::get('/musculation/report/{id}', [App\Http\Controllers\FunctionaryController::class, 'report'])->name('report')->middleware(['can:roles,"Musculacion"']);


Route::get('/coach/select_athlete', [App\Http\Controllers\SportsController::class, 'view_athletes_sports'])->name('vista.athletes_sports')->middleware(['can:roles,"Admin","Instructor"']);
Route::put('/coach/select_athlete/{sport}', [App\Http\Controllers\SportsController::class, 'edit'])->name('ckeditor');

Route::get('/coach/select_athlete', [App\Http\Controllers\SportController::class, 'view_athletes_sports'])->name('vista.athletes_sports')->middleware(['can:roles,"Admin","Instructor"']);
Route::put('/coach/select_athlete/{sport}', [App\Http\Controllers\SportController::class, 'edit'])->name('ckeditor');


//Vista de Atletas Registrados
Route::get('/athletes/viewathlete', [App\Http\Controllers\AthleteController::class, 'index_athleteview'])->name('athletesview')->middleware(['can:roles,"Admin"']);
//Modificar datos de atleta
//Ver datos específicos
//Eliminar un atleta
Route::put('/athletes/viewathlete/{athlete}', [App\Http\Controllers\AthleteController::class, 'athleteview_delete'])->name('athlete.delete');
