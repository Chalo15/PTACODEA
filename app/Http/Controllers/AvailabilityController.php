<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Http\Requests\StoreAvailabilityRequest;
use Illuminate\Http\Request;

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
        } else {
            $availabilities = $user->availabilities;
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

        $user->availabilities()->create($request->validated());

        return redirect()->route('availabilities.index')->with('status', 'Disponibilidad creada exitosamente!');
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
