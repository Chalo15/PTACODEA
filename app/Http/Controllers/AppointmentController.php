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
        $appointments = Appointment::with('availability')->get();

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
            'athlete_id' => $user->athlete->id
        ]);
        
        //Envio de notificacion al encargado de musculacion;
        User::where('identification',$appoint->availability->user->identification)
        ->each(function(User $user)use ($appoint){
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

        $appointment->availability->update(['state' => 'CONFIRMADA']);

        
        //Envio de notificacion al Atleta;
        User::where('identification',$appointment->athlete->user->identification)
        ->each(function(User $user)use ($appointment){
            $user->notify(new AppointmentNotification($appointment));
            //Envio de mail
        });
        Mail::to($appointment->athlete->user->email)->send(new ConfirmMail());


        return redirect()->route('appointments.index')->with('status', 'Cita confirmada exitosamente!');
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
