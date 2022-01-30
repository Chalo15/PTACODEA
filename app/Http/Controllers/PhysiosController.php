<?php

namespace App\Http\Controllers;

use App\Models\Physio;
use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePhysioRequest;
use App\Http\Requests\UpdatePhysioRequest;
use Barryvdh\DomPDF\Facade as PDF;

class PhysiosController extends Controller
{
    /**
     * Cree una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware("can:role,'Admin','Fisioterapia'");
    }

    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $role = Auth::user()->role->description;
        $user = Auth::user()->id;


        if ($role == "Admin") {
            $physios = Physio::with('user')->get();
            return view('physios.index', compact('physios'));
        } else {

            $physios = Physio::where('user_id', '=', $user)->get();
            return view('physios.index', compact('physios'));
        }
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $athletes = Athlete::with('user')->get();

        $severities = config("general.severities");

        return view('physios.create', compact('athletes', 'severities'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhysioRequest $request)
    {
        $user = $request->user();

        $user->physios()->create($request->validated());

        return redirect()->route('physios.index')->with('status', 'Documento creado exitosamente!');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Physio  $physio
     * @return \Illuminate\Http\Response
     */
    public function show(Physio $physio)
    {
        //
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Physio  $physio
     * @return \Illuminate\Http\Response
     */
    public function edit(Physio $physio)
    {
        $physio->with('athlete');
        $severities = config("general.severities");

        return view('physios.edit', compact('physio', 'severities'));
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Physio  $physio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhysioRequest $request, Physio $physio)
    {
        $physio->update($request->validated());

        return redirect()->route('physios.index')->with('status', 'Documento editado exitosamente!');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Physio  $physio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physio $physio)
    {
        //
    }

    /**
     * Generacion de pdf de fisioterapeutas.
     *
     * @param  \App\Models\Physio  $physio
     */
    public function generatePDF(Physio $physio)
    {
        $pdf = PDF::loadView('pdfs.physio', compact('physio'));

        return $pdf->download('document.pdf');

        return $pdf->download($physio->athlete->user->full_name . '.pdf');
    }
}
