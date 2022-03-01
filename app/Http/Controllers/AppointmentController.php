<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Availability;
use Illuminate\Http\Request;

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

        if ($user->hasRole(['Musculacion'])) {
            $appointments = Appointment::with('availability')->get();
        } else {
            $appointments = Appointment::where('athlete_id', '=', $user->athlete->id)->get();
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

        Appointment::create($request->validated() + [
            'athlete_id' => $user->athlete->id
        ]);

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

            return redirect()->route('appointments.index')->with('status', 'Solicitud confirmada exitosamente!');
        } else {
            $appointment->availability->update(['state' => 'PENDIENTE']);
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
