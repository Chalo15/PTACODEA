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

Route::get('/users/athletes', [App\Http\Controllers\UsersController::class, 'index'])->name('athletes');

Route::get('/users', [App\Http\Controllers\Atleta_moduleController::class, 'index'])->name('athlete_module');

Route::post('/users/athletes',  [App\Http\Controllers\guardarAtletaController::class, 'guardado'])->name('athletes.guardado');

Route::get('test', function () {

    return view('PruebaCKEDITOR.vistackeditor');
});

Route::post('test', function (Request $request) {
    dd($request->all());
})->name("testF");
