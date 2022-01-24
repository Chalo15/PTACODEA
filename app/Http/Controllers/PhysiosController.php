<?php

namespace App\Http\Controllers;

use App\Models\Physio;
use Illuminate\Http\Request;
use App\Models\Athlete;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            $physio = Physio::with('user')->paginate(5);
            return view('physios.index', compact('physio'));
        } else {

            $physio = new Physio();
            $physio = Physio::where('user_id', '=', $user)->paginate(5);
            return view('physios.index', compact('physio'));
        }
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $athletes = Athlete::with('user')->paginate(5);
        $user = Auth::user()->id;

        return view('physios.create', compact('athletes', 'user'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Physio  $physio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Physio $physio)
    {
        //
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
}
