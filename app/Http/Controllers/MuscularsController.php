<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMuscularRequest;
use App\Http\Requests\UpdateMuscularRequest;
use App\Models\Athlete;
use App\Models\Muscular;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class MuscularsController extends Controller
{
    /**
     * Cree una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware("can:role,'Admin','Musculacion'");
    }

    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();

        $musculars = $user->role->description == 'Admin' ?
            Muscular::with('user', 'athlete.user', 'athlete.sport')->get() :
            $user->musculars->load('user', 'athlete.user', 'athlete.sport');

        return view('musculars.index', compact('musculars'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $athletes = Athlete::with('user')->get();
        return view('musculars.create', compact('athletes'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreMuscularRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMuscularRequest $request)
    {
        //dd($request->all());
        $user = $request->user();
        $user->musculars()->create($request->validated());

        /*$user->update([
            'athlete_id' => $identification
        ]);*/
        return redirect()->route('musculars.index')->with('status', 'Registro creado exitosamente!');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function show(Muscular $muscular)
    {
        //
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function edit(Muscular $muscular)
    {
        $muscular->with('athlete');

        return view('musculars.edit', compact('muscular'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\UpdateMuscularRequest  $request
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMuscularRequest $request, Muscular $muscular)
    {
        $muscular->update($request->validated());

        return redirect()->route('musculars.index')->with('status', 'Documento editado exitosamente!');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muscular $muscular)
    {
        //
    }


    public function generatePDF(Muscular $muscular)
    {
        $pdf = PDF::loadView('pdfs.muscular', compact('muscular'));

        return $pdf->download('document.pdf');

        return $pdf->download($muscular->athlete->user->full_name . '.pdf');
    }
}
