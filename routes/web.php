<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AthletesController;
use App\Http\Controllers\PhysiosController;
use App\Http\Controllers\MuscularsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\NotificationController;
use App\Mail\ConfirmMail;
use App\Mail\CredentialsMail;
use App\Mail\PhysioConfirmMail;
use App\Mail\UpdateCredentialsMail;
use App\Models\Appointment;

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
    Route::get('export/excel', [UsersController::class, 'export'])->name('users.export');
    Route::get('', [UsersController::class, 'index'])->name('users.index');
    Route::get('create', [UsersController::class, 'create'])->name('users.create')->middleware("can:role,'Admin'");
    Route::post('', [UsersController::class, 'store'])->name('users.store');
    Route::get('{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('{user}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware("can:role,'Admin'");
    Route::put('{user}', [UsersController::class, 'update'])->name('users.update');
    Route::get('delete/{user}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware("can:role,'Admin'");
});

/**
 * Rutas del Perfil
 */
Route::prefix('profile')->group(function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('personal-information', [ProfileController::class, 'updatePersonalInformation'])->name('profile.update-personal-information');
    Route::put('password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::put('picture', [ProfileController::class, 'updatePicture'])->name('profile.update-picture');
});

/**
 * Rutas de Deportes
 */
Route::prefix('sports')->group(function () {
    Route::get('', [SportsController::class, 'index'])->name('sports.index');
    Route::get('{sport}', [SportsController::class, 'show'])->name('sports.show');
    Route::get('{sport}/edit', [SportsController::class, 'edit'])->name('sports.edit')->middleware("can:role,'Admin'");
    Route::put('{sport}', [SportsController::class, 'update'])->name('sports.update');
});

/**
 * Rutas de Atletas
 */
Route::prefix('athletes')->group(function () {
    Route::get('export/excel', [AthletesController::class, 'export'])->name('athletes.export');
    Route::get('', [AthletesController::class, 'index'])->name('athletes.index');
    Route::get('create', [AthletesController::class, 'create'])->name('athletes.create')->middleware("can:role,'Admin'");
    Route::post('', [AthletesController::class, 'store'])->name('athletes.store');
    Route::get('{athlete}', [AthletesController::class, 'show'])->name('athletes.show');
    Route::get('{athlete}/edit', [AthletesController::class, 'edit'])->name('athletes.edit')->middleware("can:role,'Admin'");
    Route::put('{athlete}', [AthletesController::class, 'update'])->name('athletes.update');
    Route::get('delete/{athlete}', [AthletesController::class, 'destroy'])->name('athletes.destroy')->middleware("can:role,'Admin'");
});

/**
 * Rutas de Musculaciones
 */
Route::prefix('musculars')->group(function () {
    Route::get('', [MuscularsController::class, 'index'])->name('musculars.index');
    Route::get('create', [MuscularsController::class, 'create'])->name('musculars.create')->middleware("can:role,'Musculacion'");
    Route::post('', [MuscularsController::class, 'store'])->name('musculars.store');
    Route::get('{muscular}', [MuscularsController::class, 'show'])->name('musculars.show');
    Route::get('{muscular}/edit', [MuscularsController::class, 'edit'])->name('musculars.edit')->middleware("can:role,'Musculacion'");
    Route::put('{muscular}', [MuscularsController::class, 'update'])->name('musculars.update');
    Route::get('{muscular}/generate-pdf', [MuscularsController::class, 'generatePDF'])->name('musculars.generate-pdf');
    Route::get('{user}/generateReport-pdf', [MuscularsController::class, 'generateReportPDF'])->name('musculars.generateReport-pdf');
});

/**
 * Rutas de Fisioterapias
 */
Route::prefix('physios')->group(function () {
    Route::get('', [PhysiosController::class, 'index'])->name('physios.index');
    Route::get('create', [PhysiosController::class, 'create'])->name('physios.create')->middleware("can:role,'Fisioterapia'");
    Route::post('', [PhysiosController::class, 'store'])->name('physios.store');
    Route::get('{physio}', [PhysiosController::class, 'show'])->name('physios.show');
    Route::get('{physio}/edit', [PhysiosController::class, 'edit'])->name('physios.edit')->middleware("can:role,'Fisioterapia'");
    Route::put('{physio}', [PhysiosController::class, 'update'])->name('physios.update');
    Route::get('{physio}/generate-pdf', [PhysiosController::class, 'generatePDF'])->name('physios.generate-pdf');
    Route::get('{user}/generateReport-pdf', [PhysiosController::class, 'generateReportPDF'])->name('physios.generateReport-pdf');
});

/**
 * Rutas de Entrenamientos
 */
Route::prefix('trainings')->group(function () {
    Route::get('', [TrainingsController::class, 'index'])->name('trainings.index');
    Route::get('create', [TrainingsController::class, 'create'])->name('trainings.create')->middleware("can:role,'Instructor'");
    Route::post('', [TrainingsController::class, 'store'])->name('trainings.store');
    Route::get('{training}', [TrainingsController::class, 'show'])->name('trainings.show');
    Route::get('{training}/edit', [TrainingsController::class, 'edit'])->name('trainings.edit')->middleware("can:role,'Instructor'");
    Route::put('{training}', [TrainingsController::class, 'update'])->name('trainings.update');
    Route::get('{training}/generate-pdf', [TrainingsController::class, 'generatePDF'])->name('trainings.generate-pdf');
    Route::get('{training}/generate-reportPdf', [TrainingsController::class, 'generateReport'])->name('trainings.generate-ReportPdf');
});

/**
 * Rutas de Disponibilidades
 */
Route::prefix('availabilities')->group(function () {
    Route::get('', [AvailabilityController::class, 'index'])->name('availabilities.index');
    Route::get('create', [AvailabilityController::class, 'create'])->name('availabilities.create')->middleware("can:role,'Musculacion','Fisioterapia'");
    Route::post('', [AvailabilityController::class, 'store'])->name('availabilities.store');
    Route::put('{availability}', [AvailabilityController::class, 'update'])->name('availabilities.update')->middleware("can:role,'Musculacion','Fisioterapia'");
    Route::delete('{availability}', [AvailabilityController::class, 'destroy'])->name('availabilities.destroy')->middleware("can:role,'Musculacion','Fisioterapia'");
});

/**
 * Rutas de Disponibilidades
 */
Route::prefix('appointments')->group(function () {
    Route::get('', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::put('{appointment}', [AppointmentController::class, 'update'])->name('appointments.update')->middleware("can:role,'Musculacion','Fisioterapia'");
    /*Route::get('create', [AvailabilityController::class, 'create'])->name('availabilities.create');
    Route::delete('{availability}', [AvailabilityController::class, 'destroy'])->name('availabilities.destroy');*/
});

/*Rutas de Notificaciones*/
Route::prefix('notifications')->group(function () {
    Route::get('', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('api', [NotificationController::class, 'indexApi'])->name('notifications.index-api');
    //Route::get('unread', [NotificationController::class, 'readNotifications'])->name('notifications.readNotifications');
    Route::put('markAll', [NotificationController::class, 'markAll'])->name('notifications.markAll');
    Route::put('{id}/markNotification', [NotificationController::class, 'markNotification'])->name('notifications.markNotification');
    Route::put('{appointment}/accept', [NotificationController::class, 'accept'])->name('notifications.accept');
    //Route::put('{id}/markNotification', [NotificationController::class, 'markNotification'])->name('notifications.markNotification');
});
