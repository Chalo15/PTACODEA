<?php

namespace App\Http\Controllers;

use App\Models\Muscular;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
            $muscular = Muscular::with('user')->paginate(5);
            return view('musculars.index', compact('muscular'));
        } else {

            $muscular = new Muscular();
            $muscular = Muscular::where('user_id', '=', $user)->paginate(5);
            return view('musculars.index', compact('muscular'));
        }
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muscular = Muscular::with('user')->paginate(5);
            return view('musculars.create', compact('muscular'));
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
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
        //
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Muscular $muscular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muscular $muscular)
    {
        //
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
}
