<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Http\Requests\StoreAvailabilityRequest;
use Exception;
use Illuminate\Http\Request;
use App\Notifications\AppointmentNotification;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();

        if ($user->hasRole(['Admin'])) {
            $availabilities = Availability::all();
        } else if ($user->hasRole(['Atleta'])) {
            $availabilities = Availability::where([['state', '=', 'DISPONIBLE'], ['date', '>=', date('Y.m.d', strtotime("-1 days"))]])->get();
        } else {
            $availabilities = Availability::where('state', '=', 'PENDIENTE')->orWhere('state', '=', 'DISPONIBLE')->where([['user_id', '=', $user->id], ['date', '>', date('Y.m.d', strtotime("-1 days"))]])->get();
        }

        return view('availabilities.index', compact('availabilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Availability $availabilities)
    {
        //
        $schedules = config('general.schedules');

        return view('availabilities.create', compact('availabilities', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAvailabilityRequest $request)
    {
        $user = $request->user();
        try {
            $user->availabilities()->create($request->validated());
            return redirect()->route('availabilities.index')->with('status', 'Disponibilidad creada exitosamente!');
        }
        catch (Exception $e) {
            return redirect()->route('availabilities.create')->with('status', 'ERROR: Ya Existe una Disponibilidad Creada en ese Horario!');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function show(Availability $availability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function edit(Availability $availability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Availability $availability)
    {
        //
        $availability->update(['state' => 'DISPONIBLE']);

        return redirect()->route('availabilities.index')->with('status', 'Disponibilidad aprobada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Availability  $availability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Availability $availability)
    {
        $availability->delete();

        return redirect()->route('availabilities.index')->with('status', 'Disponibilidad eliminada exitosamente!');
    }
}
