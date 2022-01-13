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

//Retorno de vista formulario de reserva de instalaciones
Route::get('/Reservations/booking_form', [App\Http\Controllers\AthleteController::class, 'Reserva_Form'])->name('booking_form');

//retorno de vista de formulario de registro de atletas
Route::get('/users/athletes', [App\Http\Controllers\AthleteController::class, 'index'])->name('athletes');

//guardado de registro de atletas
Route::post('/users/athletes',  [App\Http\Controllers\AthleteController::class, 'guardado'])->name('athletes.guardado');

//retorno de vista de formulario de registro de atletas externos
Route::get('/users/externalathletes', [App\Http\Controllers\ExternalAthleteController::class, 'index'])->name('external_athletes');

//guardado de registro de atletas Externos
Route::post('/users/externalathletes',  [App\Http\Controllers\ExternalAthleteController::class, 'guardado'])->name('external_athletes.guardado');




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
Route::get('/users/register', [App\Http\Controllers\UsersController::class, 'index'])->name('register');

//Vista para visualizar datos del atleta
Route::get('/athletes/verdatos/{athlete}', [App\Http\Controllers\AthleteController::class, 'vistaDatos'])->name('datos')->middleware(['can:roles,"Admin","Atleta"']);

//Vista del formulario de agregar extra de usuarios
Route::get('/users/athlete_extra_data', [App\Http\Controllers\ExtraDataController::class, 'datos_extra'])->name('datos_extra');
//Añadido de los datos extra del atleta
Route::post('/users/athlete_extra_data', [App\Http\Controllers\ExtraDataController::class, 'add_extra_data'])->name('add_extra_data');


Route::get('/config/ckeditor', [App\Http\Controllers\SportController::class, 'index'])->name('vista.ckeditor')->middleware(['can:roles,"Admin","Instructor"']);
Route::put('/config/ckeditor/{sport}', [App\Http\Controllers\SportController::class, 'edit'])->name('ckeditor');



//Registrar datos de atleta por parte del fisioterapeuta
Route::get('/physiotherapy/listAthletes',[App\Http\Controllers\FunctionaryController::class,'list'])->name('listAthletes')->middleware(['can:roles,"Fisioterapia"']);
Route::get('/physiotherapy/appointment/{id}',[App\Http\Controllers\FunctionaryController::class,'appointment'])->name('appointment')->middleware(['can:roles,"Fisioterapia"']);

//Registrar datos de atleta por parte del encargado de musculacion
Route::get('/musculation/catalogAthletes',[App\Http\Controllers\FunctionaryController::class,'catalog'])->name('catalogAthletes')->middleware(['can:roles,"Musculacion"']);
Route::get('/musculation/report/{id}',[App\Http\Controllers\FunctionaryController::class,'report'])->name('report')->middleware(['can:roles,"Musculacion"']);

Route::get('/coach/select_athlete', [App\Http\Controllers\SportController::class, 'view_athletes_sports'])->name('vista.athletes_sports')->middleware(['can:roles,"Admin","Instructor"']);
Route::post('/coach/select_athlete/{sport}', [App\Http\Controllers\SportController::class, 'edit'])->name('ckeditor');

//Vista de Atletas Registrados
Route::get('/athletes/viewathlete', [App\Http\Controllers\AthleteController::class, 'index_athleteview'])->name('athletesview')->middleware(['can:roles,"Admin"']);
//Modificar datos de atleta
//Ver datos específicos
//Eliminar un atleta
Route::put('/athletes/viewathlete/{athlete}', [App\Http\Controllers\AthleteController::class, 'athleteview_delete'])->name('athlete.delete');


