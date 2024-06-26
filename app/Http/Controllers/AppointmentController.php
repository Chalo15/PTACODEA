<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Availability;
use App\Notifications\AppointmentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Role;
use App\Mail\ConfirmMail;
use App\Mail\PhysioConfirmMail;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = request()->user();
        //dd($user->id);

        if ($user->hasRole(['Musculacion']) || $user->hasRole(['Fisioterapia'])) {
            $appointments = Appointment::where('user_id', '=', $user->id)->get();
            //
        } else {
            $appointments = Appointment::where('coach_id', '=', $user->coach->id)->get();
        }

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        //
        $availability = Availability::findOrFail($request->availability_id);
        $availability->update(['state' => 'SOLICITADA']);

        $user = $request->user();

        $appoint = Appointment::create($request->validated() + [
            'coach_id' => $user->coach->id,
            'user_id' => $availability->user->id
        ]);

        //Envio de notificacion al encargado de musculacion o al fisioterapeuta;
        User::where('identification', $appoint->availability->user->identification)
            ->each(function (User $user) use ($appoint) {
                $user->notify(new AppointmentNotification($appoint));
            });


        return redirect()->route('availabilities.index')->with('status', 'Cita reservada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {


        if ($request->action == 'A') {
            $appointment->availability->update(['state' => 'CONFIRMADA']);

            //Envio de notificacion al Atleta;
            User::where('identification', $appointment->coach->user->identification)
                ->each(function (User $user) use ($appointment) {
                    //Se guarda en una variable las notificaciones
                    $AppoitmentNotification = new AppointmentNotification($appointment);
                    $user->notify($AppoitmentNotification);

                    //Rol del usuario, ya sea de musculacion o fisioterapeuta
                    $role = $appointment->availability->user->role_id;
                    //Email de confirmacion del usuario a notificar
                    $email = $appointment->coach->user->email;

                    //Envio de email al usuario que pidio una reserva para musculacion
                    if ($role == 5) {
                        Mail::to($email)->send(new ConfirmMail($appointment));
                    }
                    //Envio de email al usuario que pidio una reserva para fisioterapia
                    elseif ($role == 4) {
                        Mail::to($email)->send(new PhysioConfirmMail($appointment));
                    }
                });


            return redirect()->route('appointments.index')->with('status', 'Solicitud confirmada exitosamente!');
        } else {


            $appointment->availability->update(['state' => 'PENDIENTE']);
            //Envio de notificacion al Entrenador;
            User::where('identification', $appointment->coach->user->identification)
                ->each(function (User $user) use ($appointment) {
                    //Se crea una variable con la informacion de las notificaciones
                    $AppoitmentNotification = new AppointmentNotification($appointment);
                    $user->notify($AppoitmentNotification);
                    //Rol del usuario, ya sea de musculacion o fisioterapeuta
                    $role = $appointment->availability->user->role_id;

                    //Email de confirmacion del usuario a notificar, en este caso seria al
                    //usuario que pidio la reserva
                    $email = $appointment->coach->user->email;

                    //Envio de email al usuario que pidio una reserva para musculacion
                    if ($role == 5) {
                        Mail::to($email)->send(new ConfirmMail($appointment));
                    }
                    //Envio de email al usuario que pidio una reserva para fisioterapia
                    elseif ($role == 4) {
                        Mail::to($email)->send(new PhysioConfirmMail($appointment));
                    }
                });

            $appointment->delete();

            return redirect()->route('appointments.index')->with('status', 'Solicitud cancelada exitosamente. Se ha cambiado su estado a PENDIENTE.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
